@extends('layouts.master')
@section('Content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('assets/img/shop1.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Shop</h1>
                        <span class="subheading">Super Cool Clothes</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


  <div class="container">
      <div class="row">
          <div class="col-6">
              <img src="{{asset($product->thumbnail)}}">
          </div>
          <div class="col-6">
         <h2>{{$product->title}}</h2><hr>
              {{$product->description}}<hr>
              <b>Price: {{$product->price}}TK</b><hr>
              <a href="#" class="btn btn-primary">Checkout With PAYPAL</a>
          </div>

      </div>

  </div>

@endsection