<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        $categories = Category::all();

        $menu = Menu::when(request('search'), function ($query) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.menu.index', compact('menu', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin.menu.add', compact('categories'));
    }

    /**
     * Define variable strtolower
     * 
     * @param string $str — The input string.
     * @return string
     */
    function strtolower($str)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Menu $menu)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['price'] = $request->price;
        $data['description'] = $request->description;
        $data['featured'] = $request->featured;
        $data['category_id'] = $request->category_id;
        $image = $request->file('image');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $extension = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'public/menu/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data['image'] = $image_url;
            $menu = DB::table('menus')->insert($data);

            return redirect()->route('admin.menu.index');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $categories = Category::all();

        return view('admin.menu.details')->with([
            'menu' => $menu,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menu.edit')->with([
            'menu' => $menu,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->featured = $request->featured;
        $menu->category_id = $request->category_id;
        $menu->save();
        return redirect()->route('admin.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu   $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu.index');
    }
}
