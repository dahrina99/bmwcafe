@extends('layouts.admin')

@section('content-title','Detail Menu')

@section('content')
<div class="container">
    <div style="margin: 4%; margin-top: 2%; margin-bottom: 2%">
        <h5 style="text-align: center;"> Detail {{ $menu->name }} </h5>
        <hr />
        <div class="menu-form">
            <div class="menu-image">
                <div class="card" style="width: 300px;">
                    <img src="{{ asset($menu->image) }}" class="card-img-top" style="width: 300px; height: 300px;">
                </div>
            </div>
            <div class=" menu-forms">
                <div class="form-group row">
                    <label for="name" style="width: 125px; font-size: 15px"> Name </label>
                    <div class="col-md-10">
                        <input id="name" type="text" style="font-size: 15px;" class="form-control" name="name" value="{{ $menu->name }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" style="width: 125px; font-size: 15px"> Category </label>
                    <div class="col-md-10">
                        <input id="name" type="text" style="font-size: 15px;" class="form-control" name="name" value="{{ $menu->categories->category_name }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" style="width: 125px; font-size: 15px"> Price </label>
                    <div class="col-md-10">
                        <input id="price" type="number" style="font-size: 15px;" class="form-control" name="price" value="{{ $menu->price }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" style="width: 125px; font-size: 15px"> Description </label>
                    <div class="col-md-10">
                        <input id="description" type="text" style="font-size: 15px;" class="form-control" name="description" value="{{ $menu->description }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="featured" style="width: 125px; font-size: 15px"> Best Menu </label>
                    <div class="col-md-10">
                        @if($menu->featured == '1')
                        <input id="featured" type="text" style="font-size: 15px;" class="form-control" name="featured" value="Ya" readonly>
                        @else
                        <input id="featured" type="text" style="font-size: 15px;" class="form-control" name="featured" value="Tidak" readonly>
                        @endif
                    </div>
                </div>
                <a href="{{ route('admin.menu.edit', $menu) }}">
                    <button type="submit" class="btn btn-success" style="margin-top:20px; font-size: 15px;">
                        Edit
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection