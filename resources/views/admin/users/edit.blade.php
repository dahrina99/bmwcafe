@extends('layouts.admin')

@section('content-title','Edit User')

@section('content')
<div class="container">
    <div style="margin: 4%; margin-top: 2%; margin-bottom: 2%">
        <h5 style="text-align: center; font-family: Poppins;"> Edit {{ $user->name}} </h5>
        <hr />
        @can('superadmin')
        <form action="{{ route('admin.users.update', $user) }}" method="POST" style="padding-top: 10px; font-size: 15px;">
            <div class="form-group row">
                <label for="name" style="padding-right: 10px; width: 100px"> Name </label>
                <div class="col-md-10">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                </div>
            </div>

            <div class="form-group row" style="padding-top: 10px;">
                <label for="email" style="padding-right: 14px; width: 100px"> Email </label>
                <div class="col-md-10">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                </div>
            </div>

            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row" style="padding-top: 10px;">
                <div>
                    <label for="roles" style="padding-right: 10px; width: 100px"> Roles </label>
                </div>
                @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if($user->roles()->get()->contains($role->id)) checked="checked" @endif/>
                    <label> {{ $role->name}} </label>
                </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-danger" style="font-size: 15px; margin-top:20px">
                Save
            </button>
        </form>
        @endcan
        
    </div>
</div>
@endsection