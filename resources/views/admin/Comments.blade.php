@extends('layouts.AdminDashboard')
@section('Content')
    <div class="container-fluid"style=" height: 500px; weight:400px; padding-left: 270px; padding-top: 90px; ">
        <div class="row">
            <div class="card-content" style="background: white;" >
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User name</th>
                        <th>Content</th>
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comment as $Comment)
                        <tr>
                            <td>{{$Comment->id}}</td>
                            <td><a href="#">{{$Comment->user->name}}</a></td>
                            <td>{{$Comment->Content}}</td>
                            <td>{{\Carbon\Carbon::parse($Comment->created_at)->diffForHumans()}}</td>
                            <td>{{\Carbon\Carbon::parse($Comment->updated_at)->diffForHumans()}}</td>
                            <td><a href="#">Delete || Edit</a> </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection