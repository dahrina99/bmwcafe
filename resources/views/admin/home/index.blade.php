@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h6 style="font-weight: bold; color: black; font-family: Poppins"> Hi,  {{ Auth::user()->name }} Welcome Back! <br></h6>
        <div class="notice container" style="padding: 2%;">
            <hr>
            <h6 style="text-align: center; color: #95949B; font-family: Poppins;"> Working hours </h6>
           
            <hr>
            @foreach ($home as $homes)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="table-secondary" style="text-align: center;"> Day </th>
                        <th scope="col" class="table-secondary" style="text-align: center;"> Hour </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-week" style="text-align: center;"> Monday </td>
                        <td class="table-week" style="text-align: center;"> {{ $homes->monday }} </td>
                    </tr>
                    <tr>
                        <td class="table-week" style="text-align: center;"> Tuesday </td>
                        <td class="table-week" style="text-align: center;"> {{ $homes->tuesday }} </td>
                    </tr>
                    <tr>
                        <td class="table-week" style="text-align: center;"> Wednesday </td>
                        <td class="table-week" style="text-align: center;"> {{ $homes->wednesday }} </td>
                    </tr>
                    <tr>
                        <td class="table-week" style="text-align: center;"> Thursday </td>
                        <td class="table-week" style="text-align: center;"> {{ $homes->thursday }} </td>
                    </tr>
                    <tr>
                        <td class="table-week" style="text-align: center;"> Friday </td>
                        <td class="table-week" style="text-align: center;"> {{ $homes->friday }} </td>
                    </tr>
                    <tr>
                        <td class="table-week" style="text-align: center;"> Saturday </td>
                        <td class="table-week" style="text-align: center;"> {{ $homes->saturday }} </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"> Sunday </td>
                        <td style="text-align: center;"> {{ $homes->sunday }} </td>
                    </tr>
                </tbody>
            </table>
            <br>
           
            
            
            <hr>
            <div class="important-text">
            <table class="table table-bordered">
                <h6 style="text-align: center; font-weight: bold; color:black; font-family: Poppins"> Important Announcement </h6>
                <tbody>
                    <tr>
                        <td style="text-align: center; font-family: Poppins"> {{ $homes->notice }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
            @can('superadmin')
            <a href="{{ route('admin.home.edit', $homes) }}">
                <button type="submit" class="btn btn-success" style="margin-top:20px; font-size: 15px; color:white">
                    Edit Website
                </button>
            </a>
            @endcan
            @endforeach
        </div>
    </div>

</div>
@endsection