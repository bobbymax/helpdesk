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
use HelpDesk\Mail\SendReminder;
use HelpDesk\Mail\TicketClosed;
use HelpDesk\Activity;
use HelpDesk\Admin;

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
        //$tickets = $this->loggedin()->tickets;
        $tickets = Ticket::where('user_id', $this->loggedin()->id)->where('archived', 0)->latest()->get();
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
        return redirect()->route('tickets.index');
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
        return view('pages.users.tickets.show', compact('ticket'));
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

    public function close(Ticket $ticket)
    {
        $ticket->archived = 1;
        $ticket->save();

        Activity::create([
            'user_id' => $this->loggedin()->id,
            'activity' => "Closed a Ticket",
        ]);


        Mail::to("icthelpdesk@ncdmb.gov.ng")->cc($ticket->owner->email)->queue(new TicketClosed($ticket));

        flash()->success('Success!!', 'This ticket is now closed.');
        return redirect()->route('tickets.index');
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

    public function archived()
    {
        $tickets = Ticket::where('archived', 1)->latest()->get();
        return view('pages.users.tickets.index', compact('tickets'));
    }

    public function reopen(Ticket $ticket)
    {
        $ticket->archived = 0;
        $ticket->resolved = 0;
        $ticket->reopened = $ticket->reopened + 1;
        $ticket->save();

        Activity::create([
            'user_id' => $this->loggedin()->id,
            'activity' => "Re-Opened a Ticket with code",
        ]);

        Mail::to("icthelpdesk@ncdmb.gov.ng")->cc($ticket->owner->email)->queue(new NewTicket($ticket));
        flash()->success('Re-Opened!!!', 'Your ticket has been reopened and a staff would be with you shortly.');
        return back();
    }

    public function reminder(Ticket $ticket)
    {
        $admin = Admin::where('name', $ticket->assigned_to)->firstOrFail();

        Activity::create([
            'user_id' => $this->loggedin()->id,
            'activity' => "Sent A Ticket Reminder to " . $admin->name,
        ]);

        Mail::to("icthelpdesk@ncdmb.gov.ng")->cc($admin->email)->queue(new SendReminder($ticket));

        flash()->success('Mail Sent!!', 'A reminder has been sent to the HelpDesk.');
        return back();
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
