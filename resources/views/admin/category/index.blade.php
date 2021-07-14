@extends('layouts.admin')

@section('content-title','Menu Category')

@section('search')
<div class="col-md-5 col-sm-5 form-group pull-right top_search">
    <form action="{{ route('admin.category.index') }}" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Category.." name="search" onblur="this.form.submit()">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go</button>
            </span>
        </div>
    </form>
</div>
@endsection

@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col"> No. </th>
                <th scope="col"> Category </th>
                <th scope="col"> </th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $index => $categories)
            <tr>
                <th scope="row"> {{ $index+1 }} </th>
                <td> {{ $categories->category_name }} </td>
                <td>
                    <a href="{{ route('admin.category.edit', $categories) }}">
                        <button type="submit" class="btn btn-success" style="font-size: 12px;">
                            Edit
                        </button>
                    </a>
                    <form action="{{ route('admin.category.destroy', $categories) }}" method="POST" class="float-left">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" style="font-size: 12px;"> Delete </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection