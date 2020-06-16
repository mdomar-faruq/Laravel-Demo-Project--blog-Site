<?php

namespace App;
use App\User;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function user(){
        return $this->belongsTo('App\User','User_id','id');
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
