<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comments;
use App\User;
class Post extends Model
{
    protected $table = 'posts';
    public function user(){
    return $this->belongsTo('App\User','User_id','id');
  }

  public function comments(){
    return $this->hasMany(Comments::class);
  }

}
