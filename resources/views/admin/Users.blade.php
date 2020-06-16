@extends('layouts.AdminDashboard')
@section('Content')


    <div class="container-fluid"style=" height: 500px; weight:350px; padding-left: 275px; padding-top: 90px; ">
        <div class="row">
            <div class="card-content col-8" style="background: white;" >
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Post</th>
                        <th>Comment</th>
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $Users)
                        <tr>
                            <td>{{$Users->id}}</td>
                            <td>{{$Users->name}}</td>
                            <td>{{$Users->email}}</td>
                            <td>{{$Users->Post->count()}}</td>
                            <td>{{$Users->comment->count()}}</td>
                            <td>{{\Carbon\Carbon::parse($Users->created_at)->diffForHumans()}}</td>
                            <td>{{\Carbon\Carbon::parse($Users->updated_at)->diffForHumans()}}</td>
                            <td>Working</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection