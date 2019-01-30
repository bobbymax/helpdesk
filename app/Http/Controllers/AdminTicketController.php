<?php

namespace HelpDesk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use HelpDesk\Ticket;
use HelpDesk\Admin;
use HelpDesk\Department;
use HelpDesk\Category;
use HelpDesk\User;
use HelpDesk\Mail\TicketAssigned;
use Mail;
use PDF;


class AdminTicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //dd('something');
    	$tickets = Ticket::where('archived', 0)->latest()->get();
    	return view('pages.admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $departments = Department::latest()->get();
        $categories = Category::latest()->get();
        return view('pages.admin.tickets.create', compact('departments', 'categories'));
    }

    public function edit(Ticket $ticket)
    {
    	$admins = Admin::latest()->get();
    	return view('pages.admin.tickets.edit', compact('admins', 'ticket'));
    }

    public function assign(Request $request, Ticket $ticket)
    {
    	$this->validate($request, [
    		'admin_id' => 'required|integer',
    	]);

    	$id = $request->admin_id;
    	$admin = Admin::find($id);

    	if ($admin) {
    		$ticket->admins()->attach($admin->id);
			$ticket->assigned_to = $admin->name;
			$ticket->save();

			flash()->success('Success!!', 'You have successfully assigned this ticket to admin.');
            Mail::to($ticket->owner->email)->cc("IT@ncdmb.gov.ng")->queue(new TicketAssigned($ticket));
    	} else {
    		flash()->error('Oops!!', 'Something seems to be wrong.');
    	}

    	return redirect()->route('admin.tickets.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'department_id' => 'required|integer',
            'category_id' => 'required|integer',
            'room_no' => 'required|integer',
            'complain' => 'required|min:3',
            'priority' => 'required|string',
        ]);

        $user = $this->getOrCreateUser($request->name, $request->email);

        $department = Department::find($request->department_id);

        $ticket = new Ticket;

        $ticket->ticket_code = ticketcode($department->directorate->abv, $department->abv);
        $ticket->department_id = $department->id;
        $ticket->category_id = $request->category_id;
        $ticket->room_no = $request->room_no;
        $ticket->complain = $request->complain;
        $ticket->priority = $request->priority;

        $user->tickets()->save($ticket);

        flash()->overlay('Success', 'A Ticket has been generated for this user.');
        return redirect()->route('admin.tickets.index');
    }

    protected function getOrCreateUser($username, $user_email)
    {
        $user = User::where('email', $user_email)->first();

        if (! $user) {
            $user = User::create([
                'name' => $username,
                'email' => $user_email,
                'password' => Hash::make('Password1'),
            ]);
        }

        return $user;
    }

    

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            if ($request->get('query') !== null) {
                $query = $request->get('query');
                $users = User::where('email', 'like', '%' . $query . '%')->get();

                $values = array();

                if ($users->count() > 0) {
                    foreach ($users as $user) {
                        $values[] = $user->email;
                    }

                    //$data = json_encode($values);
                    $data = $values;
                } else {
                    $data = "";
                }

                return response()->json($data);

            }
        }
    }

    public function approvals()
    {
        $tickets = Ticket::where('report_generated', '>=', 1)->where('archived', 1)->where('approved', 0)->latest()->get();
        return view('pages.admin.tickets.approvals', compact('tickets'));
    }

    public function close(Ticket $ticket)
    {
        $ticket->approved = 1;
        $ticket->save();

        flash()->success('Success!!', 'This ticket is now closed.');
        return redirect()->route('admin.tickets.approval');
    }

    public function update(Ticket $ticket)
    {
    	$ticket->resolved = true;
        $ticket->archived = true;
        $ticket->save();

        flash()->success('Congrats!!', 'This ticket has been marked as resolved and it would be archived.');
        return back();
    }
}
