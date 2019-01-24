<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Ticket;
use HelpDesk\Issue;
use HelpDesk\Category;
use Illuminate\Http\Request;
use Auth;
use DB;
use Mail;
use HelpDesk\Mail\NewTicket;
use HelpDesk\Activity;

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
        //$issues = Issue::latest()->get();
        $categories = Category::latest()->get();
        return view('pages.users.tickets.create', compact('categories'));   
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
            'issues' => 'required|integer',
            'categories' => 'required|integer',
            'specification' => 'required|string',
            'complain' => 'required|min:3',
            'priority' => 'required|string',
        ]);

        $ticket = new Ticket;

        $ticket->ticket_code = ticketcode($this->loggedin()->profile->department->directorate->abv, $this->loggedin()->profile->department->abv);

        $ticket->issue_id = $request->issues;
        $ticket->category_id = $request->categories;
        $ticket->issue = $request->specification;
        $ticket->complain = $request->complain;
        $ticket->priority = $request->priority;

        $this->loggedin()->tickets()->save($ticket);

        Activity::create([
            'user_id' => $this->loggedin()->id,
            'activity' => "Created Ticket",
        ]);

        Mail::to("icthelpdesk@ncdmb.gov.ng")->cc($ticket->owner->email)->queue(new NewTicket($ticket));

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

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $select = $request->select;
            $value = $request->value;
            $dependent = $request->dependent;

            if ($value !== null) {

                $query = DB::table($select)->where('id', $value)->first();

                if ($select == 'categories') {

                    $results = Issue::where('category_id', $query->id)->pluck('name', 'id')->all();


                } else {

                    $results = $query;
                    
                }

                //dd($results);

                $data = view('pages.users.ajaxs.issues', compact('results', 'select', 'dependent'))->render();

                return response()->json(['options'=>$data]);
                
            }
        }
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
