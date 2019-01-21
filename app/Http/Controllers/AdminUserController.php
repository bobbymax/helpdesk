<?php

namespace HelpDesk\Http\Controllers;

use Illuminate\Http\Request;
use HelpDesk\User;
use HelpDesk\Division;
use HelpDesk\Department;
use HelpDesk\Location;
use HelpDesk\Profile;
use Illuminate\Support\Facades\Hash;
use Mail;
use HelpDesk\Mail\NewStaff;

class AdminUserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::latest()->get();
        $departments = Department::latest()->get();
        $locations = Location::latest()->get();
        return view('pages.admin.users.create', compact('divisions', 'departments', 'locations'));
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
            'email' => 'required|email|unique:users',
            'staff_id' => 'required|integer|unique:profiles',
            'location_id' => 'required|integer',
            'division_id' => 'required',
            'department_id' => 'required',
            'room_no' => 'required',
        ]);


        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('Password1'),

        ]);

        if ($user) {
            $profile = Profile::create([
                'user_id' => $user->id,
                'location_id' => $request->location_id,
                'staff_id' => $request->staff_id,
                'department_id' => $request->department_id,
                'division_id' => $request->division_id,
                'room_no' => $request->room_no,
            ]);
        }

        Mail::to($user->email)->queue(new NewStaff($user));

        flash()->success('Success!!', 'You Have Created this User successfully');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'directorate_id' => 'required|integer',
            'department_id' => 'required|integer',
            'room_no' => 'required',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->save()) {

            $user->profile->department_id = $request->department_id;
            $user->profile->directorate_id = $request->directorate_id;
            $user->profile->room_no = $request->room_no;

            $user->profile->save();

        }

        flash()->success('Success!!', 'User and User profile updated successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash()->success('Success', 'User deleted successfully.');
        return redirect()->route('users.index');
    }
}
