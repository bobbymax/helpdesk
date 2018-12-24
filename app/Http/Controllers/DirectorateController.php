<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Directorate;
use Illuminate\Http\Request;

class DirectorateController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $directorates = Directorate::latest()->get();
        return view('pages.admin.directorates.index', compact('directorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.directorates.create');
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
            'name' => 'required',
            'abv' => 'required',
        ]);

        Directorate::create([
            'name' => $request->name,
            'slug' => slugify($request->name),
            'abv' => $request->abv,
        ]);

        flash()->success('Success!!', 'Directorate record created successfully.');

        return redirect()->route('directorates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Directorate  $directorate
     * @return \Illuminate\Http\Response
     */
    public function show(Directorate $directorate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Directorate  $directorate
     * @return \Illuminate\Http\Response
     */
    public function edit(Directorate $directorate)
    {
        return view('pages.admin.directorates.edit', compact('directorate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Directorate  $directorate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directorate $directorate)
    {
        $this->validate($request, [
            'name' => 'required',
            'abv' => 'required',
        ]);

        $directorate->name = $request->name;
        $directorate->slug = slugify($request->name);
        $directorate->abv = $request->abv;

        $directorate->save();

        flash()->success('Success!!', 'Directorate record has been updated successfully.');

        return redirect()->route('directorates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Directorate  $directorate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directorate $directorate)
    {
        $directorate->delete();
        flash()->success('Success!!', 'Directorate record deleted successfully.');
        return redirect()->route('directorates.index');
    }
}
