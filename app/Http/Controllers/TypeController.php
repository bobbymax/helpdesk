<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::latest()->get();
        return view('pages.admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'position' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        Type::create([
            'position' => $request->position,
            'name' => $request->name,
            'slug' => slugify($request->name),
        ]);

        flash()->success('Success!!', 'You have created a service type successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('pages.admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validate($request, [
            'position' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        $type->position = $request->position;
        $type->name = $request->name;
        $type->slug = slugify($request->name);
        $type->save();

        flash()->success('Success!!', 'You have updated a service type successfully.');
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        flash()->success('Success!!', 'You have deleted this service type successfully.');
        return redirect()->route('types.index');
    }
}
