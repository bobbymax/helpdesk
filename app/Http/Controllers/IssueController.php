<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Issue;
use Illuminate\Http\Request;
use HelpDesk\Category;

class IssueController extends Controller
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
        $issues = Issue::latest()->get();
        return view('pages.admin.issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('pages.admin.issues.create', compact('categories'));
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
            'category_id' => 'required|integer',
            'name' => 'required|string',
            'issues' => 'required|min:3',
        ]);

        Issue::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => slugify($request->name),
            'issues' => json_encode($request->issues),
        ]);

        flash()->success('Success!!', 'Issue for the category has been created successfully.');
        return redirect()->route('issues.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        return view('pages.admin.issues.edit', compact('issue'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string',
            'issues' => 'required|min:3',
        ]);

        $issue->category_id = $request->category_id;
        $issue->name = $request->name;
        $issue->slug = slugify($request->name);
        $issue->issues = json_encode($request->issues);

        $issue->save();

        flash()->success('Success!!', 'Issue has been updated successfully');
        return redirect()->route('issues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        flash()->overlay('Hmm!!', 'I hope you know what you are doing', 'info');
        return redirect()->route('issues.index');
    }
}
