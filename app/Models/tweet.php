<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class tweet extends Model
{
  use softDeletes;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable =[
     'user_id','text',
   ];


   public function user()
   {
     return $this->belongsTo(User::class);
   }

   public function favorites()
   {
     return $this->hasMany(favorite::class);
   }

   /*public function replys()
   {
     return $this->hasMany(tweet::class);
   }*/


}
