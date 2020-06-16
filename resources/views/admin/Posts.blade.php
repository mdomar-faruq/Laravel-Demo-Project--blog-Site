@extends('layouts.AdminDashboard')
@section('Content')


    <div class="container-fluid"style=" height: 500px; weight:350px; padding-left: 275px; padding-top: 90px; ">
        <div class="row">
            <div class="card-content col-8" style="background: white;" >
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>User ID</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $Post)
                        <tr>
                            <td>{{$Post->id}}</td>
                            <td><a href="{{route('Singlepost',$Post->id)}}">{{$Post->title}}</a></td>
                            <td>{{$Post->Content}}</td>
                            <td>{{\Carbon\Carbon::parse($Post->created_at)->diffForHumans()}}</td>
                            <td>{{\Carbon\Carbon::parse($Post->updated_at)->diffForHumans()}}</td>
                            <td>{{$Post->User_id}}</td>
                            <td>
                                <a class="btn btn-success " href="{{route('EditPost',[$Post->id])}}">Edit</a>
                                ||
                                <form method="post" id="deletePost-{{$Post->id}}" action="{{route('DeletePost',$Post->id)}}"> @csrf
                                <a class="btn btn-danger" onclick="document.getElementById('deletePost-{{$Post->id}}'.submit())" href="{{route('DeletePost',$Post->id)}}" > delete</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection