<?php

namespace App\Http\Controllers;

use App\Comments;
use App\User;
use App\Http\Requests\UserUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function dashboard(){
    return view('User.UserContent');
  }
  public function Comments(){

    return view('User.Comments');
  }
    public function NEWComments(Request $request){
      $comment=new Comments;
      $comment->Post_id=$request['Post'];
      $comment->User_id=Auth::id();
      $comment->Content=$request['comment'];
      $comment->save();
      return back();

    }
    public function Profile(){
        return view('User.Profile');
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
