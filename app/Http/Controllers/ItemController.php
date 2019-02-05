<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Item;
use HelpDesk\Brand;
use HelpDesk\Inventory;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $items = Item::latest()->get();
        return view('pages.admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::latest()->get();
        $inventories = Inventory::latest()->get();
        $items = Item::latest()->get();

        return view('pages.admin.items.create', compact('brands', 'inventories', 'items'));
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
            'brand_id' => 'required|integer',
            'inventory_id' => 'required|integer',
            'parent' => 'required',
            'name' => 'required|string',
            'qty' => 'required',
        ]);

        $item = new Item;

        $item->brand_id = $request->brand_id;
        $item->inventory_id = $request->inventory_id;
        $item->parent = $request->parent;
        $item->name = $request->name;
        $item->qty = $request->qty;

        if ($request->qty > 0) {
            $item->in_stock = 1;
        }

        $item->save();

        flash()->success('Success!!', 'Item has been created successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $brands = Brand::latest()->get();
        $inventories = Inventory::latest()->get();
        $products = Item::latest()->get();

        return view('pages.admin.items.edit', compact('item', 'brands', 'inventories', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request, [
            'brand_id' => 'required|integer',
            'inventory_id' => 'required|integer',
            'parent' => 'required',
            'name' => 'required|string',
            'qty' => 'required',
        ]);

        $item->brand_id = $request->brand_id;
        $item->inventory_id = $request->inventory_id;
        $item->parent = $request->parent;
        $item->name = $request->name;
        $item->qty = $request->qty;

        if ($request->qty > 0) {
            $item->in_stock = 1;
        }

        $item->save();

        flash()->success('Success!!', 'Item has been updated successfully.');
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        flash()->success('Success!!', 'Item has been deleted successfully.');
        return back();
    }
}
