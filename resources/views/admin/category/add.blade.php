@extends('layouts.admin')

@section('content-title','Add Category')

@section('content')
<div class="container">
    <div style="margin: 4%; margin-top: 2%; margin-bottom: 2%">
        <h5 style="text-align: center;"> Add Category </h5>
        <hr />

        <form action="{{ route('admin.category.store') }}" method="POST" style="padding-top: 10px;" enctype="multipart/form-data">
            @csrf
            <div class="menu-forms">
                <div class="form-group row">
                    <label for="name" style="width: 150px; font-size: 15px"> Category Name </label>
                    <div class="col-md-10">
                        <input id="category_name" type="text" style="font-size: 15px;" style="font-size: 15px;" class="form-control" name="category_name" value="{{ old('category_name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slug" style="width: 150px; font-size: 15px"> Slug Category </label>
                    <div class="col-md-10">
                        <input id="slug" type="text" style="font-size: 15px;" style="font-size: 15px;" placeholder="(contoh: mie_aceh)" class="form-control" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>
                    </div>
                </div>
                <button type=" submit" class="btn btn-success" style="margin-top:20px; font-size: 15px;">
                    Add
                </button>
            </div>
        </form>
    </div>
</div>
@endsection