<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Project;
use HelpDesk\Type;
use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
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
        $projects = Project::latest()->get();
        return view('pages.admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::latest()->get();
        return view('pages.admin.projects.create', compact('types'));
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
            'issue' => 'required',
            'status' => 'required',
            'todo' => 'required',
        ]);

        Project::create([
            'type_id' => $request->type_id,
            'issue' => $request->issue,
            'status' => $request->issue,
            'todo' => $request->todo,
        ]);

        flash()->success('Success!!', 'You have successfully created a project.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::latest()->get();
        return view('pages.admin.projects.edit', compact('types', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'type_id' => 'required|integer',
            'issue' => 'required',
            'status' => 'required',
            'todo' => 'required',
        ]);

        $project->type_id = $request->type_id;
        $project->issue = $request->issue;
        $project->status = $request->status;
        $project->todo = $request->todo;

        $project->save();

        flash()->success('Success!!', 'You have successfully created a project.');
        return redirect()->route('projects.index');
    }

    public function monthlyReport()
    {
        $currentMonth = date('m');
        $currentYear = date('Y');

        $projects = Project::whereIn(DB::raw('MONTH(created_at)'), [$currentMonth])
                           ->whereIn(DB::raw('YEAR(created_at)'), [$currentYear])
                           ->latest()
                           ->get();
        return view('pages.admin.reports.report', compact('projects'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        flash()->success('Success!!', 'You have deleted this project successfully.');
        return redirect()->route('projects.index');
    }
}
