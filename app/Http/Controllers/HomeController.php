<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Website;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $websites = Website::all();
        $Menus = Menu::where('featured', true)->take(8)->get();

        return view('home')->with([
            'menus' => $Menus,
            'websites' => $websites,
        ]);
    }

    public function admin()
    {
        return view('admin.home.index');
    }

    public function superadmin()
    {
        return view('admin.home.index');
    }
}
