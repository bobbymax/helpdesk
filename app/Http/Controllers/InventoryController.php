<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
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
        $inventories = Inventory::latest()->get();
        return view('pages.admin.inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->name as $name) {
            if ($name !== null) {
                Inventory::create([
                    'name' => $name,
                    'slug' => slugify($name),
                ]);   
            }   
        }

        flash()->success('Success!!', 'Inventory created successfully');
        return redirect()->route('inventories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('pages.admin.inventories.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $inventory->name = $request->name;
        $inventory->slug = slugify($request->name);
        $inventory->save();

        flash()->success('Success!!', 'Inventory updated successfully');
        return redirect()->route('inventories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        flash()->success('Success', 'Inventory deleted successfully.');
        return back();
    }
}
