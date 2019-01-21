<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
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
        $locations = Location::latest()->get();
        return view('pages.admin.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.locations.create');
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
            'name' => 'required|string|max:255',
        ]);

        Location::create([
            'name' => $request->name,
            'slug' => slugify($request->name),
        ]);

        flash()->success('Success!!!', 'Location created successfully.');
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('pages.admin.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $location->name = $request->name;
        $location->slug = slugify($request->name);
        $location->save();

        flash()->success('Success!!!', 'Location updated successfully.');
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        flash()->success('Success!!', 'You have successfully deleted this location.');
        return redirect()->route('locations.index');
    }
}
