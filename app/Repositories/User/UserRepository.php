<?php
namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
  public function getUserRecordByJson($id =-1)
  {
    if($id == -1){
      return User::get()->toJson();
    }else{
      return User::find($id)->toJson();
    }
  }
}
