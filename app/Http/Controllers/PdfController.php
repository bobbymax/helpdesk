<?php

namespace HelpDesk\Http\Controllers;

use Illuminate\Http\Request;
use HelpDesk\Project;
use HelpDesk\Service;
use PDF;
use DB;

class PdfController extends Controller
{


	public function __construct()
	{
		$this->middleware('auth:admin');
	}

    public function generateReport()
    {
        // Fetch all customers from database
        $currentMonth = date('m');
        $currentYear = date('Y');

        $projects = Project::whereIn(DB::raw('MONTH(created_at)'), [$currentMonth])
                           ->whereIn(DB::raw('YEAR(created_at)'), [$currentYear])
                           ->latest()
                           ->get();
        $services = Service::latest()->get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pages.admin.monthly.report', compact('projects', 'services'));
        $pdf->setPaper('A4', 'landscape');
        // If you want to store the generated pdf to the server then you can use the store function
        //$pdf->save(public_path().'reports/_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('report.pdf');

        //return back();
    }
}
