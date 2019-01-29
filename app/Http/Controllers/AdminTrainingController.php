<?php

namespace HelpDesk\Http\Controllers;

use Illuminate\Http\Request;
use HelpDesk\Training;

class AdminTrainingController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$trainings = Training::latest()->get();
    	return view('pages.admin.trainings.index', compact('trainings'));
    }

    public function show(Training $training)
    {
    	return view('pages.admin.trainings.show', compact('training'));
    }
}
