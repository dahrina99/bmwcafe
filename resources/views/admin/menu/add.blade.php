@extends('layouts.admin')

@section('content-title','Add Menu')

@section('content')
<div class="container">
    <div style="margin: 4%; margin-top: 2%; margin-bottom: 2%">
        <h5 style="text-align: center;"> Add Menu </h5>
        <hr />

        <form action="{{ route('admin.menu.store') }}" method="POST" style="padding-top: 10px;" enctype="multipart/form-data">
            @csrf
            <div class="menu-forms" style="display: grid; grid-template-columns: 0.5fr 1fr;">
                <div class="image-forms">
                    <div class="image" style="width: 250px; height: 250px; border: 1px solid black">
                        <img id="previewImg" alt="Menu Image" style="width: 250px; height: 250px">
                    </div>
                    <div class="col-md-10" style="padding: 0px; width: 250px">
                        <div class="custom-file">
                            <div class="input-group">
                                <input name="image" id="image" type="file" class="form-control" style="font-size: 15px;" accept=" image/*" onchange="previewFile(this)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="forms">
                    <div class="form-group row">
                        <label for="name" style="width: 150px; font-size: 15px"> Name </label>
                        <div class="col-md-10">
                            <input id="name" type="text" style="font-size: 15px;" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slug" style="width: 150px; font-size: 15px"> Slug Menu </label>
                        <div class="col-md-10">
                            <input id="slug" type="text" style="font-size: 15px;" placeholder="(contoh: Menu-1)" class="form-control" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="category" style="width: 160px; font-size: 15px"> Category </label>
                        <div class="col-md-5">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="" style="font-size: 15px;"> Select Category... </option>
                                @foreach ($categories as $category)
                                <option name="category_id" value="{{ $category->id }}" style="font-size: 15px;"> {{ $category->category_name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="price" style="width: 150px; font-size: 15px"> Price </label>
                        <div class="col-md-10">
                            <input id="price" type="text" style="font-size: 15px;" placeholder="(contoh: 12000)" class="form-control" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: 20px;">
                        <label for="featured" style="width: 150px; font-size: 15px"> Best Seller? </label>
                        <div class="col-md-10">
                            <input type="radio" name="featured" value="1" /> Yes
                            <input type="radio" name="featured" value="0" /> No
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="desc" style="width: 150px; font-size: 15px"> Menu Description </label>
                        <div class="col-md-10">
                            <textarea style="font-size: 15px;" class="form-control" name="description" rows="3" value="{{ old('description') }}"></textarea>
                        </div>
                    </div>
                    <button type=" submit" class="btn btn-success" style="margin-top:20px; font-size: 15px;">
                        Add Menu
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewImg').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection