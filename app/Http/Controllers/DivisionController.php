<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Division;
use HelpDesk\Directorate;
use Illuminate\Http\Request;

class DivisionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::latest()->get();
        return view('pages.admin.divisions.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directorates = Directorate::latest()->get();
        return view('pages.admin.divisions.create', compact('directorates'));
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
            'directorate_id' => 'required|integer',
            'name' => 'required|string',
            'abv' => 'required'
        ]);

        Division::create([
            'directorate_id' => $request->directorate_id,
            'name' => $request->name,
            'slug' => slugify($request->name),
            'abv' => $request->abv,
        ]);

        flash()->success('Success!!', 'Division created successfully.');
        return redirect()->route('divisions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        $directorates = Directorate::latest()->get();
        return view('pages.admin.divisions.edit', compact('division', 'directorates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $this->validate($request, [
            'directorate_id' => 'required|integer',
            'name' => 'required|string',
            'abv' => 'required'
        ]);

        $division->directorate_id = $request->directorate_id;
        $division->name = $request->name;
        $division->slug = slugify($request->name);
        $division->abv = $request->abv;

        $division->save();

        flash()->success('Success!!', 'Division created successfully.');
        return redirect()->route('divisions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();
        flash()->overlay('Hmmm!!!', 'I sure hope you know what you are doing', 'info');
        return redirect()->route('divisions.index');
    }
}
