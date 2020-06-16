@extends('layouts.AdminDashboard')
@section('Content')


    <div class="container-fluid"style=" height: 500px; weight:350px; padding-left: 275px; padding-top: 90px; ">
        <div class="row">
            <div class="card-content col-8" style="background: white;" >
                <h3 class="btn-default">New Product</h3><hr>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                @endif
                <form method="Post" action="{{route('AdminNewProductsPost')}}" enctype="multipart/form-data">@csrf
           <ul class="form-group col-5">

               <li>
                   <label style=" color: #0f0f0f" for="example2">Thumbnail</label>
                   <input type="file" name="thumbnail" class="form-control" id="example2">
               </li>
               <li>
                   <label style=" color: #0f0f0f" for="example">Title</label>
                   <input type="text" name="title" class="form-control" id="example">
               </li>
               <li>
                   <label style=" color: #0f0f0f" for="example3">Description</label>
                   <input type="text" name="description" class="form-control" style="height: 100px; width: 60%;" id="example3">
               </li>
               <li>
                   <label style=" color: #0f0f0f" for="example5">Price</label>
                   <input type="number" name="price" class="form-control" id="example5">
               </li>
               <li>
                   <button class="btn btn-success" type="submit">Create Product</button>
               </li>

           </ul>
                </form>

            </div>
        </div>
    </div>

    @endsection
