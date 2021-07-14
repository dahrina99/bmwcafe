<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminHome;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['home'] = AdminHome::all();
        return view('admin.home.index', ['home' => $data['home']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminHome  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminHome $home)
    {
        return view('admin.home.edit')->with([
            'home' => $home,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminHome  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminHome $home)
    {
        $home->monday = $request->monday;
        $home->tuesday = $request->tuesday;
        $home->wednesday = $request->wednesday;
        $home->thursday = $request->thursday;
        $home->friday = $request->friday;
        $home->saturday = $request->saturday;
        $home->sunday = $request->sunday;
        $home->notice = $request->notice;
        $home->save();

        return redirect()->route('admin.home.index');
    }
}
