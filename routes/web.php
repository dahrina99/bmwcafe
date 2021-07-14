<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// menu
Route::get('/menu/{menu}', [App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');

//shop
Route::get('/shop', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
Route::get('/shop/{menu}', [App\Http\Controllers\MenuController::class, 'show'])->name('shop.show');

//cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{menu}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::patch('/cart/{menu}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');

//checkout
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index')->middleware('auth');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store')->middleware('auth');
Route::get('/complete', [App\Http\Controllers\CompleteController::class, 'index'])->name('complete.index')->middleware('auth');

//admin 
Route::get('/admin/index', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.index')->middleware('can:adminpage');
Route::namespace("App\Http\Controllers\Admin")->prefix("admin")->name("admin.")->group(function () {
    Route::resource("/users", UsersController::class, ["except" => ["show", "create", "store"]])->middleware('can:adminpage');
    Route::resource("/home", HomeController::class)->middleware('can:adminpage');
    Route::resource("/menu", MenuController::class)->middleware('can:adminpage');
    Route::resource("/featured", FeaturedMenuController::class, ["except" => ["show", "create", "store"]])->middleware('can:adminpage');
    Route::resource("/category", CategoryController::class)->middleware('can:adminpage');
    Route::resource("/website", WebsiteController::class, ["except" => ["show", "destroy"]])->middleware('can:superadmin');
    Route::resource("/order", OrderController::class, ["except" => ["create", "store"]])->middleware('can:adminpage');
    Route::resource("/transaction", OrderController::class, ["except" => ["show", "create", "store"]])->middleware('can:adminpage');
});

Route::get('/admin/list', [App\Http\Controllers\Admin\UsersController::class, 'list'])->name('admin.list')->middleware('can:adminpage');

Route::get('/search', [App\Http\Controllers\MenuController::class, 'search'])->name('search');
