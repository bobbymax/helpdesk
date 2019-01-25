<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $menus = Menu::latest()->get();
        return view('pages.admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.menus.create');
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
            'name' => 'required|string',
            'guard' => 'required|string',
            'icon' => 'required',
            'permission' => 'required|string',
        ]);

        Menu::create([
            'name' => $request->name,
            'slug' => slugify($request->name),
            'guard' => $request->guard,
            'icon' => $request->icon,
            'permission' => $request->permission,
            'url' => $request->url
        ]);

        flash()->success('Success!!', 'Menu item created successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \HelpDesk\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \HelpDesk\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('pages.admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \HelpDesk\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'guard' => 'required|string',
            'icon' => 'required',
            'permission' => 'required|string',
        ]);

        $menu->name = $request->name;
        $menu->slug = slugify($request->name);
        $menu->guard = $request->guard;
        $menu->icon = $request->icon;
        $menu->permission = $request->permission;
        $menu->url = $request->url;
        $menu->save();

        flash()->success('Success!!', 'Menu item created successfully.');
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \HelpDesk\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        flash()->success('Success!!', 'You have successfully deleted this menu.');
        return redirect()->route('menus.index');
    }
}
