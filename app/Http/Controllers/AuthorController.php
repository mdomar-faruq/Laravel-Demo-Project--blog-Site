<?php

namespace App\Http\Controllers;
use App\Post;
Use App\Comments;
use App\Http\Requests\UserUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePost;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
  public function __construct(){
    //check user colume author
    $this->middleware('CheckRole:author');
  }
  public function dashboard(){


    return view('Author.AuthorContent');
  }

  //Author post
  public function Posts(){
      $posts=Auth::user()->Post;
    return view('Author.Posts',compact('posts'));
  }
    public function NewPost(){
        return view('Author.CreatePost');
    }
    public function CreatePost(CreatePost $request){

        $post = new Post();
        $post-> title =$request['title'];
        $post-> Content =$request['Content'];
        $post->User_id=Auth::id();
        $post->save();
        return redirect()->route('AuthorPosts')->with('success','Post is Successfully create.');
    }
    public function EditPost($id){

        $Post=Post::where('id',$id)->where('User_id',Auth::id())->first();
        return view('Author.EditPost',compact('Post'));
    }
    public function PostEditPost(CreatePost $request,$id){

        $post=Post::where('id',$id)->where('User_id',Auth::id())->first();
        $post-> title =$request['title'];
        $post-> Content =$request['Content'];
        $post->save();
        return redirect()->route('AuthorPosts')->with('success','Post is Update.');
    }
    public function DeletePost($id){

        $post=Post::where('id',$id)->where('User_id',Auth::id())->first();
        $post->delete();
        return back();
    }


    //Author comment
  public function Comments(){
    return view('Author.Comments');
  }
  //Author Profile
    public function Profile(){
        return view('Author.Profile');
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
            $user->password = Hash::make($request['New_Password']);
            $user->save();
            return redirect()->back()->with('success','Password is Update.');
        }
        return back();
    }

}
