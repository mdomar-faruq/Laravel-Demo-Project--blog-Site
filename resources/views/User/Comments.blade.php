@extends('layouts.UserDashboard')
@section('Content')
<div class="container-fluid"style=" height: 500px; weight:400px; padding-left: 270px; padding-top: 90px; ">
    <div class="row">
        <div class="card-content" style="background: white;" >
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Post ID</th>
                    <th>Comment Content</th>
                    <th>Create At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(Auth::User()->comment as $Comment)
                <tr>
                    <td>{{$Comment->id}}</td>
                    <td>{{$Comment->user->name}}</td>
                    <td><a href="#">{{$Comment->Post_id}}</a></td>
                    <td>{{$Comment->Content}}</td>
                    <td>{{\Carbon\Carbon::parse($Comment->created_at)->diffForHumans()}}</td>
                    <td><a href="#">Delete || Edit</a> </td>
                </tr>
                @endforeach

                </tbody>
            </table>

    </div>
    </div>
</div>

@endsection