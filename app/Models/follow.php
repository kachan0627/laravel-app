<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
    //
   protected $fillable = [
       'user_id','follow_id',
   ];

}
