@extends('layouts.user')

@section('breadcrumb-content')
<div class="breadcrumb">
    <div class="container">
        <ol class="breadcrumbb">
            <li class="breadcrumb-item"> <a href="/"> Beranda </a></li>
            <li class="breadcrumb-item"> <a href="/shop"> Menu </a></li>
            <li class="breadcrumb-item active"> Keranjang </li>
        </ol>
    </div>
    <form class="d-flex" action="{{ route('search') }}" method="GET">
        <input class="form-control me-2" value="{{ request()->input('query') }}" type="search" placeholder="Cari Menu.." aria-label="Search" name="query" id="query">
        <button class="btn fa fa-search" type="submit"> </button>
    </form>
</div>
@endsection

@section('content')

<div class="cart" style="min-height: 300px">
    @if (Cart::count() > 0)
    <div class="cart-title">
        <h5> There is {{ Cart::count() }} Order in your Cart! </h5>
    </div>
    <div class="cart-table">
        <table class="table">
            <tbody>
                @foreach (Cart::content() as $item)
                <tr>
                    <td>
                        <a href="{{ route('shop.show', $item->model->slug) }}" style="text-decoration: none;">
                            <t style="font-weight: bold;"> {{ $item->model->name }} </t>
                            <br>
                            <d style="color: #acacac;"> </d>
                        </a>
                    </td>
                    <td>
                        <select class="quantity form-control" data-id="{{ $item->rowId }}" required>
                            @for ($i = 1; $i < 10 + 1 ; $i++) <option style="font-size: 15px;" {{ $item->qty == $i ? 'selected' : '' }}> {{ $i}} </option>
                                @endfor
                        </select>
                    </td>
                    <td>
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        Rp. {{ $item->subtotal }}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td style="color: #acacac;"> Subtotal </td>
                    <td style="color: #acacac;"> Rp. {{ Cart::subtotal() }} </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="color: #acacac;"> Tax </td>
                    <td style="color: #acacac;"> Rp. {{ Cart::tax() }} </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> Total </td>
                    <td> Rp. {{ Cart::total() }} </td>
                </tr>
            </tbody>
        </table>

    </div>
    <br>
    <div class="cart-buttons">
        <a href="{{ route('menu.index') }}" class="btn btn-secondary" style="color: white;"> Continue Shopping</a>
        <a href="{{ route('checkout.index') }}" class="btn btn-success" style="color: white; background-color: green"> Checkout </a>
    </div>

    @else

    <h3> Your cart is empty! </h3>
    <a href="{{ route('menu.index') }}" class="button"> Continue Shopping </a>
    @endif
</div>

@endsection

@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    (function() {
        const classname = document.querySelectorAll('.quantity')
        Array.from(classname).forEach(function(element) {
            element.addEventListener('change', function() {
                const id = element.getAttribute('data-id')
                axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function(response) {
                        console.log(response);
                        window.location.href = "{{ route('cart.index') }}"
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            })
        })
    })();
</script>
@endsection