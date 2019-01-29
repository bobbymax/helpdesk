<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Training;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Image;
use Storage;

class TrainingController extends Controller
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
        $trainings = $this->loggedIn()->trainings;
        return view('pages.users.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.trainings.create');
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
            'title' => 'required|string',
            'provider' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'on_board' => 'required',
        ]);

        $training = new Training;

        $training->title = $request->title;
        $training->provider = $request->provider;
        $training->location = $request->location;
        $training->on_board = $request->on_board;
        $training->extra = $request->extra;
        $training->start_date = Carbon::parse($request->start_date);
        $training->end_date = Carbon::parse($request->end_date);

        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/certificates/' . $filename);
            Image::make($file)->fit(1920, 1080)->save($location);
            $training->certificate = $filename;
        }

        $this->loggedIn()->trainings()->save($training);

        flash()->success('Success!!', 'Training Record Created Successfully.');

        return redirect()->route('trainings.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        return view('pages.users.trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'provider' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'on_board' => 'required',
        ]);

        $training->title = $request->title;
        $training->provider = $request->provider;
        $training->location = $request->location;
        $training->on_board = $request->on_board;
        $training->extra = $request->extra;
        $training->start_date = Carbon::parse($request->start_date);
        $training->end_date = Carbon::parse($request->end_date);

        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/certificates/' . $filename);
            Image::make($file)->fit(1920, 1080)->save($location);
            $training->certificate = $filename;
        }

        $training->save();

        flash()->success('Success!!', 'Training Record Updated Successfully.');

        return redirect()->route('trainings.index');
    }

    protected function loggedIn()
    {
        return Auth::user();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        $training->delete();
        flash()->success('Success', 'Training record deleted successfully.');
        return back();
    }
}
