<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderMenu;
use App\Models\Website;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::all();
        return view('checkout')->with([
            'websites' => $websites,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Insert into orders table
        $data = Order::create([
            'user_id' => $request->user_id,
            'order_date' => $request->order_date,
            'order_number' => $request->order_number,
            'payment_method' => $request->payment_method,
            'billing_subtotal' => $request->billing_subtotal,
            'billing_tax' => $request->billing_tax,
            'billing_total' => $request->billing_total,
        ]);

        //Insert into order_menu table
        foreach (Cart::content() as $item) {
            $cartitem = OrderMenu::create([
                'order_id' => $data->id,
                'menu_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        Cart::instance('default')->destroy();
        return redirect('complete');
    }
}
