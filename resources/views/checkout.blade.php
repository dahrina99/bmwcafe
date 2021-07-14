@extends('layouts.user')

@section('title', 'BMW Cafe - Checkout')


@section('content')

<div class="checkout-section">
    <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 100px">
            <div class="details">
                <div class="billing">
                    <div class="cart-title"> Order Detail </div>
                    <hr>
                    <form class="form-inline">
                        <div class="mb-3">
                            <label for="user_id" class="form-label"> Table </label>
                            <input type="text" value="{{ auth()->user()->name }}" class="form-control" disabled placeholder="{{ auth()->user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="payment_method" class="form-label"> Payment Method </label>
                            <select name="payment_method" id="payment_method" class="form-control" required>
                                <option value="" style="font-size: 15px;"> Select Payment Method... </option>
                                <option name="payment_method" value="Bayar Sekarang" style="font-size: 15px;"> Pay Now </option>
                                <option name="payment_method" value="Bayar Nanti" style="font-size: 15px;"> Pay Later </option>
                            </select>
                        </div>

                        <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}" />
                        <input id="order_date" name="order_date" type="hidden" value="{{ date('d M Y', strtotime(today())) }}" />
                        <input id="order_number" name="order_number" type="hidden" value="M68{{ date('Ymd', strtotime(today())) }}{{ rand(1000,9999)}}" />
                        <input id="billing_subtotal" name="billing_subtotal" type="hidden" value="{{ Cart::subtotal() }}" />
                        <input id="billing_tax" name="billing_tax" type="hidden" value="{{ Cart::tax() }}" />
                        <input id="billing_total" name="billing_total" type="hidden" value="{{ Cart::total() }}" />
                </div>
                <div class="cart-buttons" style="margin-top: 50px;">
                    <a href="{{ route('cart.index') }}" class="btn btn-secondary" style="color: white;"> Back to MyCart </a>
                    <button type="submit" class="btn btn-success" style="color: white; background-color: green"> Order Now </button>
                </div>

            </div>

            <div class="cart">
                <div class="cart-title">
                    Your Order
                </div>
                <div class="cart-table">
                    <table class="table">
                        <tbody>
                            @foreach (Cart::content() as $menu)
                            <tr>
                                <td>
                                    <t style="font-weight: bold;"> {{ $menu->model->name }} </t>
                                    <br>
                                    <d style="color: #acacac;"> </d>
                                </td>
                                <td>
                                    {{ $menu->qty }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td style="color: #acacac;"> Subtotal </td>
                                <td style="color: #acacac;"> Rp. {{ Cart::subtotal() }} </td>
                            </tr>
                            <tr>
                                <td style="color: #acacac;"> Tax </td>
                                <td style="color: #acacac;"> Rp. {{ Cart::tax() }} </td>
                            </tr>
                            <tr>
                                <td> Total </td>
                                <td> Rp. {{ Cart::total() }} </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </form>
</div>

@endsection