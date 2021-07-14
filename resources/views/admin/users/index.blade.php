@extends('layouts.admin')

@section('content-title','User Management')

@section('search')
<div class="col-md-5 col-sm-5 form-group pull-right top_search">
    <form action="{{ route('admin.users.index') }}" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." name="search" onblur="this.form.submit()">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go</button>
            </span>
        </div>
    </form>
</div>
@endsection

@section('content')
<div class="container">
    <table class="table" style="background-color: white">
        <thead class="thead-light">
            <tr>
                <th class="head" style="background-color: black; color:white;" scope="col"> No. </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> Name </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> Email </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> Roles </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> </th>
                <th class="head" style="background-color: black; color:white;" scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <th scope="row"> {{ $index+1 }} </th>
                <td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }} </td>
                <td>
                    @can('superadmin')
                    <a href=" {{ route('admin.users.edit', $user->id) }} ">
                        <button type="submit" class="btn">
                            <i class="fa fa-pencil" style="color:blue; aria-hidden="true"></i>
                        </button>
                    </a>
                    @endcan
                </td>
                <td>
                    @can('superadmin')
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="float-left">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn">
                            <i class="fa fa-trash" style="color:red;" aria-hidden="true"></i>
                        </button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination" style="justify-content:center">
    {{ $users->links() }}
</div>

<style>
    .w-5 {
        display: none;
    }
</style>
@endsection