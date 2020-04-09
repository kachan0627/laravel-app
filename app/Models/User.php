<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps =false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acount_name','nick_name','profile_image','email','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function follwers(){
      return $this->belongsToMany(self::class, 'follows', 'user_id', 'follow_id');
    }

    public function follows(){
      return $this->belongsToMany(self::class, 'follows', 'follow_id', 'user_id');
    }


    public function getAllUsers(Int $user_id){
      return $this->Where('id','<>', $user_id)->paginate(5);
    }

    public function follow(Int $user_id){
      return $this->follows()->attach($user_id);
    }
    public function unfollow(Int $user_id){
      return $this->follows()->detach($user_id);
    }

    public function isFollow(Int $user_id){
      return (boolean) $this->follows()->where('follow_id',$user_id)->first(['id']);
    }
    public function isFollowed(Int $user_id){
      return (boolean) $this->follows()->where('user_id',$user_id)->first(['id']);
    }

}
