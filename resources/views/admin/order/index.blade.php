@extends('layouts.admin')

@section('content-title','Order List')

@section('search')
<div class="col-md-5 col-sm-5   form-group pull-right top_search">
    <div class="input-group">
        <form action="{{ route('admin.transaction.index') }}" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Find by Date.." name="search" onblur="this.form.submit()">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go</button>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <table class="table" style="font-size: 14px;">
        <thead class="thead-light">
            <tr>
                <th class="head" style="background-color: black; color:white;" scope="col"> No. </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> Date </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> Order No. </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> Total </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> Order Status </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            @forelse($order as $index => $orders)
            <tr>
                <td> {{ $index+1 }} </td>
                <td> {{ $orders->date }} </td>
                <td> {{ $orders->order_number }} </td>
                <td> {{ $orders->billing_total }} </td>

                @if($orders->status == '1')
                <td style="color: green">
                    Done
                </td>
                @elseif($orders->status == '2')
                <td style="color: blue">
                    Order is in Proses
                </td>
                @else
                <td style="color: red">
                    Order must be proses
                </td>
                @endif

                <td>
                    <a href="{{ route('admin.order.show', $orders) }}">
                        <button type="button" class="btn btn-primary" style="font-size: 13px;"> Detail </button>
                    </a>
                </td>
            </tr>

            @empty
            <td></td>
            <td></td>
            <td>
            No Orders
            </td>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination" style="justify-content:center">
    {{ $order->links() }}
</div>

<style>
    .w-5 {
        display: none;
    }
</style>
@endsection