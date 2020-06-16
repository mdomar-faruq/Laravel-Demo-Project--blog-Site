@extends('layouts.AuthorDashboard')
@section('Content')


<div class="container-fluid"style=" height: 500px; weight:400px; padding-left: 270px; padding-top: 90px; ">
    <div class="row">
        <div class="card-content" style="background: white;" >
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $Posts)
                    <tr>
                        <td>{{$Posts->id}}</td>
                        <td><a href="{{route('Singlepost',$Posts->id)}}">{{$Posts->title}}</a></td>
                        <td>{{\Carbon\Carbon::parse($Posts->created_at)->diffForHumans()}}</td>
                        <td>{{\Carbon\Carbon::parse($Posts->updated_at)->diffForHumans()}}</td>
                        <td>{{$Posts->comments->count()}}</td>
                        <td>

                            <a class="btn btn-success " href="{{route('AuthorEditPost',[$Posts->id])}}">Edit</a>
                            ||
                            <form method="post" id="deletePost-{{$Posts->id}}" action="{{route('AuthorDeletePost',$Posts->id)}}"> @csrf
                                <a class="btn btn-danger" onclick="document.getElementById('deletePost-{{$Posts->id}}'.submit())" href="{{route('AuthorDeletePost',$Posts->id)}}" > delete</a>
                            </form>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection