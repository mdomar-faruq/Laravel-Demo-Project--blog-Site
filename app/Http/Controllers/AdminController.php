<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePost;
use App\Http\Requests\UserUpdate;
use App\Post;
use App\Comments;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
  public function __construct(){
    $this->middleware('CheckRole:admin');
  }
   public function dashboard(){
     return view('admin.AdminContent');
   }
   //Admin Profile controller --->
    public function Profile(){
        return view('admin.Profile');
    }
    public function ProfilePost(UserUpdate $request){
        $user = Auth::user();
        $user->name= $request['name'];
        $user->email= $request['email'];
        $user->save();

        if($request['password'] != ""){
            if(!(Hash::check($request['password'],Auth::user()->password))){
                return redirect()->back()->with('success','Password das not match');
            }
            if(strcmp($request['password'],$request['New_password'])==0){
                return redirect()->back()->with('success','new password can not same.');
            }
            $validation = $request->validate([
                'password'=>'required',
                'New_password'=>'required|string|min:6|confirmed'
            ]);
            $user->password= Hash::make($request['New_Password']);
            $user->save();
            return redirect()->back()->with('success','Password is Update.');
        }
        return back();
    }
    // comment --->
   public function Comments(){
      $comment=comments::all();
     return view('admin.Comments',compact('comment'));
   }
   //User ----->
   public function Users(){
       $users = User::all();
     return view('admin.Users',compact('users'));
   }

    //Admin Post controller --->
   public function Posts(){
       $posts=Post::all();
     return view('admin.Posts',compact('posts'));
   }
    public function NewPost(){
        return view('admin.CreatePost');
    }
    public function CreatePost(CreatePost $request){

        $post = new Post();
        $post-> title =$request['title'];
        $post-> Content =$request['Content'];
        $post->User_id=Auth::id();
        $post->save();
        return redirect()->route('AdminPosts')->with('success','Post is Successfully create.');
    }


    public function EditPost($id){

      $Post=Post::where('id',$id)->first();
        return view('admin.EditPost',compact('Post'));
    }
    public function PostEditPost(CreatePost $request,$id){

        $post=Post::where('id',$id)->first();
        $post-> title =$request['title'];
        $post-> Content =$request['Content'];
        $post->save();
        return  redirect()->route('AdminPosts')->with('success','Post is Update.');
    }
    public function DeletePost($id){

        $post=Post::where('id',$id)->first();
        $post->delete();
        return back();
    }


    //Admin Product controller ----->
    public function Products(){

      $Products=Product::all();
     return view('admin.Products',compact('Products'));
    }
    public function NewProducts(){
    return view('admin.NewProduct');
    }
    public function NewProductsPost(Request $request){
      $this->validate($request,[
          'title'=>'required|string',
          'thumbnail'=>'required|file',
          'description'=>'required',
          'price'=>'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'

      ]);
      $product= new Product;
        $product->title=$request['title'];
        $product->description=$request['description'];
        $product->price=$request['price'];
        //images part
      $thumbnail=$request->file('thumbnail');
      $fileName=$thumbnail->getClientOriginalName();
      $fileExtension=$thumbnail->getClientOriginalExtension(); //->excualy not need just
      $thumbnail->move('product-images',$fileName);  //directory file store location
      $product->thumbnail='product-images/' . $fileName;     //add name your orginal file name
      $product->save();

     return redirect()->route('AdminProducts');
    }
    public function EditProducts($id){

      $product = Product::where('id',$id)->first();
      return view('admin.ProductEdit',compact('product'));

    }
    public function EditProductsPost(Request $request,$id){

        $this->validate($request,[
            'title'=>'required|string',
            'thumbnail'=>'required|file',
            'description'=>'required',
            'price'=>'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'

        ]);
        $product = Product::where('id',$id)->first();
        $product->title=$request['title'];
        $product->description=$request['description'];
        $product->price=$request['price'];
        //images part
       if($request->hasFile('thumbnail')) {
           $thumbnail = $request->file('thumbnail');
           $fileName = $thumbnail->getClientOriginalName();
           $thumbnail->move('product-images', $fileName);  //directory file store location
           $product->thumbnail = 'product-images/' . $fileName;     //add name your orginal file name
       }
        $product->save();

        return redirect()->route('AdminProducts')->with('success','Upade Success');

    }
    public function DeleteProduct($id){

        $product=Product::where('id',$id)->first();
        $product->delete();
        return back();
    }


}
