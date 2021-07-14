@extends('layouts.admin')

@section('content-title','Detail Order')

@section('content')
<div class="container">
    <div style="margin: 4%; margin-top: 2%; margin-bottom: 2%; font-size: 15px">
        <form action="{{ route('admin.order.update', $order) }}" method="POST" style="padding-top: 10px;">
            @csrf
            {{ method_field('PUT') }}
            <h6 style="text-align: center; font-weight: bold;">
                Order #{{ $order->order_number }}
            </h6>
            <hr>
            <div class="pesanan-form">
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="order_date" style="font-size: 15px; width: 150px; padding: 5px"> Date </label>
                    <div class="col-md-8">
                        <input class="form-control" name="order_date" value="{{ $order->order_date}}" readonly>
                    </div>
                </div>
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="user_name" style="font-size: 15px; width: 150px; padding: 5px"> User Name </label>
                    <div class="col-md-8">
                        <input class="form-control" name="user_name" value="{{ $order->user->name}}" readonly>
                    </div>
                </div>
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="payment_method" style="font-size: 15px; width: 150px; padding: 5px"> Payment </label>
                    <div class="col-md-8">
                        <input class="form-control" name="payment_method" value="{{ $order->payment_method}}" readonly>
                    </div>
                </div>
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="status" style="font-size: 15px; width: 150px; padding: 5px"> Order Status </label>
                    @if($order->status == '1')
                    <div class="col-md-8" style="margin-bottom: 30px;">
                        <input class="form-control" name="status" value="Pesanan Selesai" readonly>
                    </div>
                </div>
                @else
                <div class="col-md-8">
                    <select class=" form-control" name="status" id="status">
                        <option name="status" value="1" style="font-size: 15px;" {{ $order->status == '1' ? 'selected' : ''}}> Done</option>
                        <option name="status" value="2" style="font-size: 15px;" {{ $order->status == '2' ? 'selected' : ''}}> Order is in Proses </option>
                        <option name="status" value="3" style="font-size: 15px;" {{ $order->status == '3' ? 'selected' : ''}}> Order must be Proses </option>
                    </select>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-danger" style="margin-top: 30px; margin-bottom: 30px"> Save </button>
            </div>
            @endif

        </form>
        <hr>
        <h6 style="text-align: center; font-weight: bold;">
            Order
        </h6>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center;"> No. </th>
                    <th scope="col" style="text-align: center;"> Menu </th>
                    <th scope="col" style="text-align: center;"> Total </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $datas)
                <tr>
                    <th scope="row" style="text-align: center;"> {{ $index+1 }} </th>
                    <td> {{ $datas->name }} </td>
                    <td style="text-align: center;"> {{ $datas->quantity }} </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="2" style="text-align: right;"> Subtotal </th>
                    <td style="text-align: right;"> {{ $order->billing_subtotal }} </td>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: right;"> Tax </th>
                    <td style="text-align: right;"> {{ $order->billing_tax }} </td>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: right;"> Total </th>
                    <td style="text-align: right;"> {{ $order->billing_total }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection