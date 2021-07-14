@extends('layouts.user')

@section('title', 'Mie Aceh 68 - Order Status')

@section('order-steps')
<div class="orderstep text-center">
    <div class="card-orderactive" style="width: 10rem; height: 4rem;">
        Keranjang
    </div>
    <div class="card-orderactive" style="width: 10rem; height: 4rem;">
        Checkout
    </div>
    <div class="card-orderactive" style="width: 10rem; height: 4rem;">
        Status Pesanan
    </div>
    <div class="card-order" style="width: 10rem; height: 4rem;">
        Pesanan Selesai
    </div>
</div>
@endsection

@section('content')

<div class="checkout-section">
    <form action="{{ route('checkout.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="details">
            <div class="billing">
                <div class="cart-title" style="margin-bottom: 20px;"> Nomor Pesanan {{ $order->order_number }} Ditempatkan! </div>
                <div class="status-detail">
                    <h5 style="margin-bottom: 20px;"> Pesanan anda sedang di process. </h5>
                </div>

                <div class="status-detail">
                    <h5 style="margin-bottom: 20px;"> Silahkan bayar pesanan anda ke kasir agar pesanan anda dapat di proses. </h5>
                </div>
                <hr>
                <form class="form-inline" action="{{ route('checkout.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="table" class="form-label"> Nomor Meja </label>
                        <input type="text" class="form-control" readonly placeholder="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label"> Status Pesanan </label>
                        <input type="text" class="form-control" readonly style="margin-bottom: 50px;">
                    </div>
                </form>
            </div>
            <div class="cart-buttons">
                <a href="complete" class="btn btn-danger" style="color: white; background-color: #BB4430"> Pesanan Selesai </a>
            </div>
        </div>
    </form>
</div>

@endsection