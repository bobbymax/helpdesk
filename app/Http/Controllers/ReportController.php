<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Report;
use Illuminate\Http\Request;
use HelpDesk\Category;
use HelpDesk\Admin;
use HelpDesk\Ticket;
use Auth;
use DB;
use Mail;
use HelpDesk\Mail\ReportGenerated;

class ReportController extends Controller
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
        $currentMonth = date('m');
        $currentYear = date('Y');
        $tickets = Ticket::where('archived', 1)
                           ->where('approved', 1)
                           ->whereIn(DB::raw('MONTH(created_at)'), [$currentMonth])
                           ->whereIn(DB::raw('YEAR(created_at)'), [$currentYear])
                           ->latest()
                           ->get();
        return view('pages.admin.tickets.archived', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ticket $ticket)
    {
        $admins = Admin::latest()->get();
        return view('pages.admin.reports.create', compact('admins', 'ticket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ticket $ticket)
    {
        $this->validate($request, [
            'assigned_to' => 'required|string',
            'description' => 'required|min:3',
        ]);

        $report = new Report;

        $report->report_code = time();
        $report->ticket_id = $ticket->id;
        $report->assigned_to = $request->assigned_to;
        $report->description = $request->description;

        $this->adminLoggedIn()->reports()->save($report);

        if ($report) {
            $ticket->report_generated = 1;
            $ticket->resolved = 1;
            $ticket->save();
        }

        Mail::to($ticket->owner->email)->cc("icthelpdesk@ncdmb.gov.ng")->queue(new ReportGenerated($report));

        flash()->success('Success!!', 'Report for this ticket has been generated successfully');

        return redirect()->route('admin.tickets.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('pages.admin.reports.show', compact('ticket'));
    }

    protected function adminLoggedIn()
    {
        return $admin = Auth::user();
    }
}
