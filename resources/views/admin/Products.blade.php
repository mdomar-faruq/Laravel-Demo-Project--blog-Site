@extends('layouts.AdminDashboard')
@section('Content')


    <div class="container-fluid"style=" height: 500px; weight:350px; padding-left: 275px; padding-top: 90px; ">
        <div class="row">
            <div class="card-content col-8" style="background: white;" >
               <a class="btn btn-primary">Admin Product</a>  <a href="{{route('AdminNewProducts')}}" class="btn btn-primary clearfix">New Product</a><hr>
                @if(session('success'))
                   <p class="alert alert-success">{{session('success')}}</p>
                @endif
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Products as $Product)
                        <tr>
                            <td>{{$Product->id}}</td>
                            <td><img src="{{asset($Product->thumbnail)}}" width="100"></td>
                            <td><a href="#">{{$Product->title}}</a></td>
                            <td>{{$Product->description}}</td>
                            <td>{{$Product->price}}TK</td>
                            <td>
                                <a class="btn btn-success" href="{{route('AdminEditProducts',[$Product->id])}}">Edit</a>
                                <form method="post" id="deletePost-{{$Product->id}}" action="{{route('AdminDeleteProducts',$Product->id)}}"> @csrf
                                    <a class="btn btn-danger" onclick="document.getElementById('deletePost-{{$Product->id}}'.submit())" href="{{route('AdminDeleteProducts',$Product->id)}}" > delete</a>
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