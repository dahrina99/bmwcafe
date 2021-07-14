@extends('layouts.user')

@section('title', 'shop')

@section('breadcrumb-content')
<div class="breadcrumb">
    <div class="container">
        <ol class="breadcrumbb">
            <li class="breadcrumb-item"> <a href="/"> Home </a></li>
            <li class="breadcrumb-item"> <a href="/shop"> Menu </a></li>
            <li class="breadcrumb-item active"> {{ $categoryName }} </li>
        </ol>
    </div>
</div>
@endsection

@section('category-content')
<div class="category text-center">
    @foreach($categories as $category)
    <a href="{{ route('menu.index', ['category' => $category->slug]) }}"> 
        <div class="card-category" style="width: 10rem; height: 4rem;">
            {{ $category->category_name }}
        </div>
    </a>
    @endforeach
</div>
@endsection

@section('line-break')
<hr>
@endsection

@section('title-section')
<div class="title">
    <h3 style="font-weight: bold;"> {{ $categoryName }} </h3>
</div>
<div class="search">
    <form class="d-flex" action="{{ route('search') }}" method="GET">
        <input class="form-control me-2" value="{{ request()->input('query') }}" type="search" placeholder="Cari Menu.." aria-label="Search" name="query" id="query">
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
                <img src="{{ asset($menus->image) }}" class="card-img-top" alt="..." style="width: 10rem; height: 8rem">
                <br>
                <div class="text-center">
                    <div class="title" style="font-weight: bold; color: black">
                        {{Str::limit ($menus->name, 20) }}
                    </div>
                    <div class="price"> Rp. {{ $menus->price}}</div>
                </div>
            </div>
        </a>
    </div>
    @empty
    <div> Tidak ada menu yang ditemukan </div>
    @endforelse
</div>
@endsection 
