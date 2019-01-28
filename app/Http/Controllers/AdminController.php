<?php

namespace HelpDesk\Http\Controllers;

use Illuminate\Http\Request;
use HelpDesk\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use HelpDesk\Role;
use HelpDesk\Avatar;
use Image;
use DB;
use Auth;

class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.dashboard');
    }

    public function display()
    {
        $admins = $this->getRegisteredAdmins();
        return view('pages.admin.admins.index', compact('admins'));
    }

    /**
     * Register Admin Users and Assign Role
     */
    public function registerAdmin(Request $request)
    {
        $this->validateRequest($request->all())->validate();
        $admin = $this->finalize($request->all());

        flash()->success('Success', 'You have just created an admin user.');
        return redirect()->route('admins.index');
    }

    protected function validateRequest(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'], 
        ]);
    }

    protected function finalize(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function create()
    {
        return view('pages.admin.admins.create');
    }

    public function edit(Admin $admin)
    {
        $roles = Role::latest()->get();
        return view('pages.admin.admins.edit', compact('admin', 'roles'));
    }

    public function profileView()
    {
        return view('pages.admin.profile.index');
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email',
        ]);

        $this->loggedInAdmin()->name = $request->name;
        $this->loggedInAdmin()->email = $request->email;
        $this->loggedInAdmin()->save();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/admins/' . $filename);
            Image::make($file)->fit(300, 300)->save($location);

            //
            
            if ($this->loggedInAdmin()->profilePicture) {
                $this->loggedInAdmin()->profilePicture()->update(['avatar' => $filename]);
            } else {
                $avatar = new Avatar;
                $avatar->avatar = $filename;

                $this->loggedInAdmin()->profilePicture()->save($avatar);
            }
        }

        flash()->success('Success!!', 'Your profile has been updated successfully.');
        return redirect()->route('admin.dashboard');

    }

    public function update(Request $request, Admin $admin)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email',
        ]);

        if ($request->email !== $admin->email) {
            $admin->email = $request->email;  
        }
        $admin->name = $request->name;
        $admin->save();

        if ($request->has('roles')) {
            foreach ($request->roles as $value) {
                $role = Role::with('permissions')->findOrFail($value);
                if ($value !== null) {
                    $exist = DB::select(DB::raw("SELECT * FROM admin_role WHERE admin_id = '{$admin->id}' AND role_id = '{$role->id}'"));
                    if (! $exist) {
                        $admin->actAs($role);   
                    }
                    
                }
            }
        }

        flash()->success('Success!!', 'You have updated this admin user successfully.');
        return redirect()->route('admins.index');


    }

    public function destroy(Admin $admin)
    {
        //
    }

    protected function loggedInAdmin()
    {
        return Auth::user();
    }

    protected function getRegisteredAdmins()
    {
        return Admin::latest()->get();
    }
}
