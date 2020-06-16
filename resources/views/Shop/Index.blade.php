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


<div class="Container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h3 class="text-info py-1">Specially Product</h3>
                <div class="post-preview">
                    <div class="row">
                        @foreach($product as $products)
                        <div class="col-3 card">
                          <a href="{{route('Shop_SingleProduct',$products->id)}}"><img  src="{{asset($products->thumbnail)}}" width="100" alt=""></a>
                           <div class="card-content clearfix">
                              <a href="{{route('Shop_SingleProduct',$products->id)}}">{{$products->title}}</a>
                               <p class="post-meta pb-2">Price:{{$products->price}}Tk</p>
                           </div>
                        </div>
                            <hr>
                        @endforeach
                    </div>


                </div>




        </div>
    </div>
</div>

@endsection