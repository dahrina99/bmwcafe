@extends('layouts.admin')

@section('content-title','Website Management')

@section('content')
<div class="container">
    @foreach ($website as $websites)
    <h6 style="text-align: center; font-weight: bold; font-family: Poppins; color:black">
        Informasi Situs
    </h6>
    <hr>
    <div class="forms">
        <div class="form-group row" style="padding-top: 10px;">
            <label for="about" style="font-size: 15px; width: 150px; padding: 5px; font-family: Poppins; font-size:14px"> About Cafe </label>
            <div class="col-md-8">
                <textarea class="form-control" name="about" readonly> {{ $websites->about }} </textarea>
            </div>
        </div>
    </div>
    <hr>
    <h6 style="text-align: center; font-weight: bold; font-family: Poppins; color:black">
        Header Situs
    </h6>
    <hr>
    <div class="forms">
        <div class="form-group row" style="padding-top: 10px;">
            <label for="description" style="font-size: 15px; width: 150px; padding: 5px; font-family: Poppins; font-size:14px "> Description </label>
            <div class="col-md-8">
                <textarea class="form-control" name="description" readonly>{{ $websites->description }}</textarea>
            </div>
        </div>
    </div>
    <hr>
    <h6 style="text-align: center; font-weight: bold; font-family: Poppins; color:black; font-size:14px">
       Detail Contact Information
    </h6>
    <hr>
    <div class="forms" style="display: grid; grid-template-columns: 1fr 1fr;">
        <div class="form-group row" style="padding-top: 10px;">
            <label for="email" style="font-size: 15px; width: 120px; padding: 5px"> Email </label>
            <div class="col-md-8">
                <input class="form-control" name="email" value="{{ $websites->email }}" readonly>
            </div>
        </div>
        <div class="form-group row" style="padding-top: 10px;">
            <label for="email" style="font-size: 15px; width: 120px; padding: 5px"> Phone Number </label>
            <div class="col-md-8">
                <input class="form-control" name="email" value="{{ $websites->phone }}" readonly>
            </div>
        </div>
        <div class="form-group row" style="padding-top: 10px;">
            <label for="email" style="font-size: 15px; width: 120px; padding: 5px"> Instagram </label>
            <div class="col-md-8">
                <input class="form-control" name="email" value="{{ $websites->instagram }}" readonly>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.website.edit', $websites) }}">
        <button type="submit" class="btn btn-success" style="margin-top:20px; font-size: 15px;">
            Edit Website
        </button>
    </a>
    @endforeach
</div>
@endsection