<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Website;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::all();

        if (request()->category) {
            $menu = Menu::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->paginate(8);

            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;
        } else {
            $menu = Menu::where('featured', true)->paginate(8);
            $categories = Category::all();
            $categoryName = 'Menu Unggulan';
        }

        return view('shop')->with([
            'menu' => $menu,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'websites' => $websites,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $websites = Website::all();
        $menu = Menu::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $categoryName = $categories->where('slug', request()->category)->first();

        return view('menu')->with([
            'menu' => $menu,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'websites' => $websites,
        ]);
    }

    public function search(Request $request)
    {
        $websites = Website::all();
        $query = $request->input('query');

        $menus = Menu::where('name', 'like', "%$query%")->get();

        return view('search-result')->with([
            'menu' => $menus,
            'websites' => $websites,
        ]);
    }
}
