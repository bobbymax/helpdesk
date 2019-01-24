<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Service;
use HelpDesk\Type;
use HelpDesk\Division;
use HelpDesk\Department;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $services = Service::latest()->get();
        return view('pages.admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::latest()->get();
        $divisions = Division::latest()->get();
        $departments = Department::latest()->get();

        return view('pages.admin.services.create', compact('types', 'divisions', 'departments'));
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
            'type_id' => 'required|integer',
            'division_id' => 'required',
            'department_id' => 'required',
            'description' => 'required|min:3',
        ]);

        Service::create([
            'division_id' => $request->division_id,
            'department_id' => $request->department_id,
            'type_id' => $request->type_id,
            'description' => $request->description,
        ]);

        flash()->success('Success!!', 'You have successfully created a service for today.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $types = Type::latest()->get();
        $divisions = Division::latest()->get();
        $departments = Department::latest()->get();

        return view('pages.admin.services.edit', compact('types', 'divisions', 'departments', 'service')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'type_id' => 'required|integer',
            'division_id' => 'required',
            'department_id' => 'required',
            'description' => 'required|min:3',
        ]);

        $service->division_id = $request->division_id;
        $service->department_id = $request->department_id;
        $service->type_id = $request->type_id;
        $service->description = $request->description;

        $service->save();

        flash()->success('Success!!', 'You have successfully updated this service for today.');
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        flash()->success('Success!!', 'You have deleted this service successfully.');
        return redirect()->route('services.index');
    }
}
