@extends('layouts.master')
@section('Content')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('assets/img/post-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$post->title}}</h1>

            <span class="meta">Posted by
              <a href="#">{{ $post->user->name}}</a>
              on {{date_format($post->created_at,'F d,Y')}}</span>

          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          {!! nl2br($post->Content) !!}
        </div>
      </div>
    </div>
  </article>

<div class="container">
<div class="Comments">


<hr>
   <h2>Comments</h2>
<hr>
@foreach($post->comments as $comment)
  <ul>
    <li class="form-group card pl-1 col-5">
      <p>
        {{$comment->Content}}
      </P>
      <span class="meta">
     <small>Comment by
       {{$comment->user->name}} ,on {{date_format($comment->created_at,'F d,Y')}}</small>
    </span>
    </li>
  </ul>
@endforeach
  <hr>
@if(Auth::check())
<form method="post" action="{{route('UserNEWComments')}}">@csrf
  <div class="from-group">
    <textarea class="form-control" name="comment" id=""cols="30" rows="4">
   Comment...
    </textarea>
    <input type="hidden" name="Post" value="{{$post->id}}">
  </div>
  <div class="form-group">
    <button class="btn btn-primary" type="submit">Make Comment</button>
  </div>
</form>
  @endif
  <hr>

</div>
</div>

@endsection
