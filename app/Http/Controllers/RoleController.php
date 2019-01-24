<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Role;
use HelpDesk\Permission;
use Illuminate\Http\Request;
use DB;

class RoleController extends Controller
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
        $roles = Role::latest()->get();
        return view('pages.admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.roles.create');
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
                Role::create([
                    'name' => $name,
                    'slug' => slugify($name),
                ]);
            }
        }

        flash()->success('Success!!', 'You have created a new role successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::with('roles')->latest()->get();
        return view('pages.admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $role->name = $request->name;
        $role->slug = slugify($role->name);
        $role->save();

        if ($request->permissions !== null) {
            foreach ($request->permissions as $value) {
                $permission = Permission::with('roles')->findOrFail($value);
                if ($value !== null) {
                    $exist = DB::select(DB::raw("SELECT * FROM permission_role WHERE permission_id = '{$permission->id}' AND role_id = '{$role->id}'"));
                    if (! $exist) {
                        $role->givePermissionTo($permission);   
                    }
                    
                }
            }
        }

        flash()->success('Success!!', 'You have updated this role successfully.');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        flash()->success('Success!!', 'You have deleted a role successfully.');
        return redirect()->route('roles.index');
    }
}
