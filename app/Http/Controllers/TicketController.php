<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Ticket;
use HelpDesk\Department;
use HelpDesk\Category;
use Illuminate\Http\Request;
use Auth;

class TicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = $this->loggedin()->tickets;
        return view('pages.users.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::latest()->get();
        $categories = Category::latest()->get();
        return view('pages.users.tickets.create', compact('departments', 'categories'));   
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
            'department_id' => 'required|integer',
            'category_id' => 'required|integer',
            'room_no' => 'required|integer',
            'complain' => 'required|min:3',
            'priority' => 'required|string',
        ]);

        $department = Department::find($request->department_id);

        $ticket = new Ticket;

        $ticket->ticket_code = ticketcode($department->directorate->abv, $department->abv);
        $ticket->department_id = $department->id;
        $ticket->category_id = $request->category_id;
        $ticket->room_no = $request->room_no;
        $ticket->complain = $request->complain;
        $ticket->priority = $request->priority;

        $this->loggedin()->tickets()->save($ticket);

        flash()->overlay('Thank You!!', 'An ICT staff would be with you shortly.');
        return redirect()->route('user.dashboard');
    }

    protected function loggedin()
    {
        return Auth::user();
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
