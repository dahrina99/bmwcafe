<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Website;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $websites = Website::all();
        $Menus = Menu::where('featured', true)->take(8)->get();

        return view('home')->with([
            'menus' => $Menus,
            'websites' => $websites,
        ]);
    }
}
