@extends('layouts.user')

@section('title', 'search menu')

@section('breadcrumb-content')
<div class="breadcrumb">
    <div class="container">
        <ol class="breadcrumbb">
            <li class="breadcrumb-item"> <a href="/"> Home </a></li>
            <li class="breadcrumb-item"> <a href="/shop"> Shop </a></li>
            <li class="breadcrumb-item active"> Search </li>
        </ol>
    </div>
</div>
@endsection

@section('title-section')
<div class="title">
    <h3 style="font-weight: bold;"> {{ $menu->count() }} Result(s) for '{{ request()->input('query') }}' </h3>
</div>
<div class="search">
    <form class="d-flex" action="{{ route('search') }}" method="GET">
        <input class="form-control me-2" value="{{ request()->input('query') }}" type="search" placeholder="Search for menu" aria-label="Search" name="query" id="query">
        <button class="btn fa fa-search" type="submit"> </button>
    </form>
</div>
@endsection

@section('content')

<div class="menu-section container">
    @forelse ($menu as $menus)
    <div class="menu">
        <a href="{{ route('menu.show', $menus->slug) }}">
            <div class="card" style="width: 12rem; height: 15rem;">
                <img src="{{ asset($menus->image) }}" class="card-img-top" alt="..." style="width: 9rem; height: 6rem">
                <br>
                <div class="text-center">
                    <div class="title" style="font-weight: 500;">
                        {{ $menus->name }}
                    </div>
                    <div class="price"> Rp. {{ $menus->price}}</div>
                </div>
            </div>
        </a>
    </div>
    @empty
    <div> No Menus Found </div>
    @endforelse
</div>

@endsection