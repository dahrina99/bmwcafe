@extends('layouts.admin')

@section('content-title','Edit Detail Menu')

@section('content')
<div class="container">
    <div style="margin: 4%; margin-top: 2%; margin-bottom: 2%">
        <h5 style="text-align: center;"> Edit {{ $menu->name }} </h5>
        <hr />
        <form action="{{ route('admin.menu.update', $menu) }}" method="POST" style="padding-top: 10px;">
            @csrf
            {{ method_field('PUT') }}
            <div class="menu-form">
                <div class="menu-image">
                    <div class="card" style="width: 300px;">
                        <img src="{{ asset($menu->image) }}" class="card-img-top" alt="Menu Image" style="width: 300px; height: 300px;" id="previewImg">
                    </div>
                </div>
                <div class=" menu-forms">
                    <div class="form-group row">
                        <label for="name" style="width: 125px; font-size: 15px"> Name</label>
                        <div class="col-md-10">
                            <input id="name" type="text" style="font-size: 15px;" class="form-control" name="name" value="{{ $menu->name }}" required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" style="width: 125px; font-size: 15px"> Category </label>
                        <div class="col-md-10">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="" style="font-size: 15px;"> Select Category... </option>
                                <option name="category_id" value="1" style="font-size: 15px;" {{ $menu->category_id == '1' ? 'selected' : ''}}> Signature Menu </option>
                                <option name="category_id" value="2" style="font-size: 15px;" {{ $menu->category_id == '2' ? 'selected' : ''}}> Manual Brew</option>
                                <option name="category_id" value="3" style="font-size: 15px;" {{ $menu->category_id == '3' ? 'selected' : ''}}> Espresso Base </option>
                                <option name="category_id" value="4" style="font-size: 15px;" {{ $menu->category_id == '4' ? 'selected' : ''}}> Other Coffee</option>
                                <option name="category_id" value="5" style="font-size: 15px;" {{ $menu->category_id == '5' ? 'selected' : ''}}> Non Coffee </option>
                                <option name="category_id" value="6" style="font-size: 15px;" {{ $menu->category_id == '6' ? 'selected' : ''}}> Snack </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" style="width: 125px; font-size: 15px"> Price </label>
                        <div class="col-md-10">
                            <input id="price" type="number" style="font-size: 15px;" class="form-control" name="price" value="{{ $menu->price }}" required autocomplete="price" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" style="width: 125px; font-size: 15px"> Description </label>
                        <div class="col-md-10">
                            <input id="description" type="text" style="font-size: 15px;" class="form-control" name="description" value="{{ $menu->description }}" required autocomplete="description" autofocus>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: 20px">
                        <label for=" featured" style="width: 125px; font-size: 15px;"> Menu Best Seller </label>
                        <div class=" col-md-10">
                            <input type="radio" name="featured" value="1" {{ $menu->featured == '1' ? 'checked' : ''}} /> Ya
                            <input type="radio" name="featured" style="margin-left: 50px" value="0" {{ $menu->featured == '0' ? 'checked' : ''}} /> Tidak
                        </div>

                        <script type="text/javascript">
                            document.forms['form'].elements['featured'].value = '{{$menu->featured}}'
                        </script>
                    </div>
                    <button type="submit" class="btn btn-danger" style="margin-top:20px; font-size: 15px;">
                        Save
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