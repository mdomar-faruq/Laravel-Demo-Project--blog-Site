@extends('layouts.master')
@section('Content')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('assets/img/home-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">{{remove_spaces('Persoonal blog power by Clean blog')}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($posts as $Post)
        <div class="post-preview">
          <a href="{{ route('Singlepost',$Post->id )}}">
            <h2 class="post-title">
            {{ $Post->title }}
            </h2>

          </a>
          <p class="post-meta">Posted by
            <a href="#">{{ $Post->user->name }}</a>
            on {{date_format($Post->created_at,'F d,Y')}}
          <i class="fa fa-comment"  > {{ $Post->comments->count() }}</i></p>

        </div>
        <hr>
        @endforeach
        {{$posts->links()}}


      </div>
    </div>
  </div>

@endsection
