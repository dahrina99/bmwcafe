@extends('layouts.admin')

@section('content-title','Daftar Menu')

@section('search')
<div class="col-md-5 col-sm-5 form-group pull-right top_search">
    <form action="{{ route('admin.menu.index') }}" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari Menu.." name="search" onblur="this.form.submit()">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go</button>
            </span>
        </div>
    </form>
</div> 
@endsection

@section('content')
<div class="container">
    <div class="content-list" style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
        @forelse ($menu as $menus)
        <div class="card" style="width: 12rem; height: 16rem; margin-bottom: 20px">
            <img src="{{ asset($menus->image) }}" class="card-img-top container" style="width: 10rem; height: 10rem;">
            <div class="card-body">
                <h6 class="card-title" style="text-align: center; font-size: 13px"> {{Str::limit ($menus->name, 20) }} </h6>
                <a href="{{ route('admin.menu.show', $menus) }}">
                    <button type="submit" class="btn btn-primary" style="font-size: 12px;">
                        Detail
                    </button>
                </a>
                <form action="{{ route('admin.menu.destroy', $menus) }}" method="POST" class="float-left">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger" style="font-size: 12px;"> Delete </button>
                </form>
            </div>
        </div>
        @empty
        <h6 style="text-align: center; width: 60rem"> No Menu Found </h6>
        @endforelse
    </div>
</div>

<div class="pagination" style="justify-content:center">
    {{ $menu->links() }}
</div>

<style>
    .w-5 {
        display: none;
    }
</style>
@endsection