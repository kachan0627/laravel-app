<?php
namespace Tests\Mock\Repositories;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRepositoryTest implements UserRepositoryInterface
{

  public function getUserRecordByJson($id=-1)
  {
    if($id == -1){
      //return User::get()->toJson();
      return new ModelNotFoundException;
    }else{
      //return User::find($id)->toJson();
      return new ModelNotFoundException;
    }
  }

}
