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
        
        $pdf = PDF::loadView('pages.admin.monthly.report', compact('projects', 'services'))->setPaper('A4', 'landscape');

        return $this->downloadPDF($pdf, 'report.pdf');
    }

    protected function downloadPDF($instance, $file)
    {       
        return $instance->download($file);
    }


}
