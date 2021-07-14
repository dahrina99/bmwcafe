@extends('layouts.admin')

@section('content-title','Sunting Situs')

@section('content')
<div class="container">
    <form action="{{ route('admin.website.update', $website) }}" method="POST" style="padding-top: 10px;">
        @csrf
        {{ method_field('PUT') }}
        <h6 style="text-align: center; font-weight: bold;">
            Informasi Situs
        </h6>
        <hr>
        <div class="forms">
            <div class="form-group row" style="padding-top: 10px;">
                <label for="about" style="font-size: 15px; width: 150px; padding: 5px"> About Cafe </label>
                <div class="col-md-8">
                    <textarea class="form-control" name="about" required>{{ $website->about }}</textarea>
                </div>
            </div>
        </div>
        <hr>
        <h6 style="text-align: center; font-weight: bold;">
            Header Situs
        </h6>
        <hr>
        <div class="forms">
            <div class="form-group row" style="padding-top: 10px;">
                <label for="description" style="font-size: 15px; width: 150px; padding: 5px;"> Description </label>
                <div class="col-md-8">
                    <textarea class="form-control" name="description" required>{{ $website->description }}</textarea>
                </div>
            </div>
        </div>
        <hr>
        <h6 style="text-align: center; font-weight: bold;">
            Contact Information
        </h6>
        <hr>
        <div class="forms" style="display: grid; grid-template-columns: 1fr 1fr;">
            <div class="form-group row" style="padding-top: 10px;">
                <label for="email" style="font-size: 15px; width: 120px; padding: 5px"> Email </label>
                <div class="col-md-8">
                    <input class="form-control" name="email" value="{{ $website->email }}" required>
                </div>
            </div>
            <div class="form-group row" style="padding-top: 10px;">
                <label for="phone" style="font-size: 15px; width: 120px; padding: 5px"> Phone Number </label>
                <div class="col-md-8">
                    <input class="form-control" name="phone" value="{{ $website->phone }}" required>
                </div>
            </div>
            <div class="form-group row" style="padding-top: 10px;">
                <label for="instagram" style="font-size: 15px; width: 120px; padding: 5px"> Instagram </label>
                <div class="col-md-8">
                    <input class="form-control" name="instagram" value="{{ $website->instagram }}" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-danger" style="margin-top: 20px"> Save </button>
    </form>
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