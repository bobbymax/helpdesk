<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Report;
use Illuminate\Http\Request;
use HelpDesk\Category;
use HelpDesk\Ticket;
use Auth;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ticket $ticket)
    {
        $categories = Category::latest()->get();
        return view('pages.admin.reports.create', compact('categories', 'ticket'));
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
            'category_id' => 'required|integer',
            'assigned_to' => 'required|string',
            'description' => 'required|min:3',
        ]);

        $report = new Report;

        $report->report_code = $ticket->ticket_code . "-" . getToken(4);
        $report->ticket_id = $ticket->id;
        $report->category_id = $request->category_id;
        $report->assigned_to = $request->assigned_to;
        $report->description = $request->description;

        $this->adminLoggedIn()->reports()->save($report);

        if ($report) {
            $ticket->resolved = true;
            $ticket->archived = true;
            $ticket->save();
        }

        flash()->success('Success!!', 'Report for this ticket has been generated successfully');

        return redirect()->route('admin.tickets.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    protected function adminLoggedIn()
    {
        return $admin = Auth::user();
    }
}
