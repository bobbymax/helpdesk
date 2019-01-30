<?php

namespace HelpDesk\Http\Controllers;

use Illuminate\Http\Request;
use HelpDesk\Ticket;
use HelpDesk\Profile;
use Auth;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = $this->loggedin()->tickets;
        return view('pages.users.tickets.index', compact('tickets'));
    }

    public function profile()
    {
        return view('pages.users.profile.show');
    }

    public function profileAvatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required',
        ]);

        $profile = Profile::where('user_id', $this->loggedin()->id)->firstOrFail();

        if ($profile) {
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = time() . $file->getClientOriginalName();
                $location = public_path('images/users/' . $filename);
                Image::make($file)->fit(300, 300)->save($location);
                $profile->avatar = $filename;

                $profile->save();
            }     
        }

        flash()->success('Success!!', 'Upload successful.');
        //flash()->error('Oops!!', 'Something went wrong.');
        return back();
    }

    protected function loggedin()
    {
        return Auth::user();
    }
}
