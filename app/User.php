<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use App\Post;
use App\Comments;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the Post record associated with the user.
     */
    public function Post()
    {
        return $this->hasMany('App\Post');
    }

    public function PostToday(){
      return $this->hasMany('App\Post')->where('created_at','>=',Carbon::today());
    }
    /**
     * Get the Comments record associated with the User.
     */
    public function comment(){
      return $this->hasMany('App\Comments');
    }



}
