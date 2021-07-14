@extends('layouts.admin')

@section('content-title','Edit Category')

@section('content')
<div class="container">
    <div style="margin: 4%; margin-top: 2%; margin-bottom: 2%">
        <h5 style="text-align: center;"> Edit Category {{ $category->category_name }} </h5>
        <hr />
        <form action="{{ route('admin.category.update', $category) }}" method="POST" style="padding-top: 10px;">
            @csrf
            {{ method_field('PUT') }}
            <div class="menu-form">
                <div class=" menu-forms">
                    <div class="form-group row">
                        <label for="category_name" style="width: 125px; font-size: 15px"> Category Name </label>
                        <div class="col-md-10">
                            <input id="category_name" type="text" style="font-size: 15px;" class="form-control" name="category_name" value="{{ $category->category_name }}" required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slug" style="width: 125px; font-size: 15px"> Slug Category </label>
                        <div class="col-md-10">
                            <input id="slug" type="text" style="font-size: 15px;" class="form-control" name="slug" value="{{ $category->slug }}" required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" style="margin-top:20px; font-size: 15px;">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection