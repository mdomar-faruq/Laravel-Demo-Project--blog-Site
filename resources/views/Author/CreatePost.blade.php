@extends('layouts.AuthorDashboard')
@section('Content')


<div class="container-fluid" style="height: 500px; weight:400px; padding-left: 270px; padding-top: 90px">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background: white;" >
                <hr>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                @endif
                <div class="card-header bg-light">
                    New Post
                </div>
                <hr>

                <div class="form-group col-5 pt-1 ">
                    <form method="post" action="{{route('AuthorCreatePost')}}">
                        @csrf
                    <label for="example">Title</label>
                <input type="text" name="title" id="example"  required>
                    <label for="example1">Content</label>
                <textarea name="Content"  id="example1" cols="30" rows="10"></textarea>

                    <div class="py-3"> <button class="btn btn-primary float-right" type="submit">Create Post</button></div>
                </form>
            </div>



                </div>
            </div>
        </div>
</div>



@endsection