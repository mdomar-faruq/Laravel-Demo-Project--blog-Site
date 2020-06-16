<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ShopController extends Controller
{
    public function Index(){
        $product=Product::all();
       return view('Shop.Index',compact('product'));
    }
    public function SingleProduct($id){
        $product = Product::where('id',$id)->first();
        return view('Shop.SingleProduct',compact('product'));
    }
    public function OrderProduct($id){

    }
}
