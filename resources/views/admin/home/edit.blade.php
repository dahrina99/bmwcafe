@extends('layouts.admin')

@section('content')
<div class="container">
    <form action="{{ route('admin.home.update', $home) }}" method="POST" style="padding-top: 10px;">
        @csrf
        {{ method_field('PUT') }}
        <div class="row justify-content-center">
            <h6 style="font-weight: bold; color: black; font-family: Poppins; font-size:20px"> Edit Home <br></h6>
            <div class="notice container" style="padding: 2%;">
                <hr>
                <h6 style="text-align: center; color: #86858C; font-family: Poppins"> Working hours </h6>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="table-secondary" style="text-align: center;"> Day </th>
                            <th scope="col" class="table-secondary" style="text-align: center;"> Hours </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table-week" style="text-align: center;"> Monday </td>
                            <td class="table-week" style="text-align: center;"> <input class="form-control" type="text" name="monday" value="{{ $home->monday }}" style="font-size: 13px;"> </td>
                        </tr>
                        <tr>
                            <td class="table-week" style="text-align: center;"> Tuesday </td> 
                            <td class="table-week" style="text-align: center;"> <input class="form-control" type="text" name="tuesday" value="{{ $home->tuesday }}" style="font-size: 13px;"> </td>
                        </tr>
                        <tr>
                            <td class="table-week" style="text-align: center;"> Wednesday </td>
                            <td class="table-week" style="text-align: center;"> <input class="form-control" type="text" name="wednesday" value="{{ $home->wednesday }}" style="font-size: 13px;"> </td>
                        </tr>
                        <tr>
                            <td class="table-week" style="text-align: center;"> Thursday </td>
                            <td class="table-week" style="text-align: center;"> <input class="form-control" type="text" name="thursday" value="{{ $home->thursday }}" style="font-size: 13px;"> </td>
                        </tr>
                        <tr>
                            <td class="table-week" style="text-align: center;"> Friday </td>
                            <td class="table-week" style="text-align: center;"> <input class="form-control" type="text" name="friday" value="{{ $home->friday }}" style="font-size: 13px;"> </td>
                        </tr>
                        <tr>
                            <td class="table-week" style="text-align: center;"> Saturday </td>
                            <td class="table-week" style="text-align: center;"> <input class="form-control" type="text" name="saturday" value="{{ $home->saturday }}" style="font-size: 13px;"> </td>
                        </tr>
                        <tr>
                            <td class="table-week" style="text-align: center;"> Sunday </td>
                            <td class="table-week" style="text-align: center;"> <input class="form-control" type="text" name="sunday" value="{{ $home->sunday }}" style="font-size: 13px;"> </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <hr>
                <h6 style="text-align: center; font-family: Poppins;"> Important Announcement </h6>
                <hr>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="text-align: center;"> <input class="form-control" type="text" name="notice" value="{{ $home->notice }}" style="font-size: 13px; font-family: Poppins"> </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-danger" style="margin-top: 50px"> Save </button>
            </div>
        </div>
    </form>
</div>
@endsection