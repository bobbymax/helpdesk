<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
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
        $permissions = Permission::latest()->get();
        return view('pages.admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->name as $name) {
            if ($name !== null) {
                Permission::create([
                    'name' => $name,
                    'slug' => slugify($name),
                ]);
            }
        }

        flash()->success('Success!!', 'You have created new permissions successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('pages.admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $permission->name = $request->name;
        $permission->slug = slugify($permission->name);
        $permission->save();

        flash()->success('Success!!', 'You have updated this permission successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        flash()->success('Success!!', 'You have deleted a permission successfully.');
        return redirect()->route('permissions.index');
    }
}
