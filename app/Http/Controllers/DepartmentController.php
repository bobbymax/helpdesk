<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Department;
use Illuminate\Http\Request;
use HelpDesk\Directorate;
use HelpDesk\Division;

class DepartmentController extends Controller
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
        $departments = Department::latest()->paginate(10);
        return view('pages.admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directorates = Directorate::latest()->get();
        $divisions = Division::latest()->get();
        return view('pages.admin.departments.create', compact('directorates', 'divisions'));
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
            'abv'  => 'required|unique:departments|max:255',
            'directorate_id' => 'required|integer',
        ]);

        Department::create([
            'directorate_id' => $request->directorate_id,
            'division_id' => $request->division_id,
            'name' => $request->name,
            'slug' => slugify($request->name),
            'abv' => $request->abv,
        ]);

        flash()->success('Well Done!!', 'You have successfully created a department.');
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $directorates = Directorate::latest()->get();
        $divisions = Division::latest()->get();
        return view('pages.admin.departments.edit', compact('department', 'directorates', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $this->validate($request, [

            'name' => 'required',
            'abv'  => 'required',
            'directorate_id' => 'required|integer',

        ]);

        $department->name = $request->name;
        $department->slug = slugify($request->name);
        $department->directorate_id = $request->directorate_id;
        $department->division_id = $request->division_id;
        $department->abv = $request->abv;

        $department->save();

        flash()->success('Well Done!!', 'You have successfully updated this department record.');
        return redirect()->route('departments.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        flash()->overlay('Are you Sure?!!', 'I sure hope you know what you are doing.', 'success');
        return redirect()->route('departments.index');
    }
}
