<?php
namespace Tests\Mock\Repositories;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\User\UserRepositoryInterface;

class UserRepositoryTest implements UserRepositoryInterface
{
/*  public function __construct(User $user){
      $this->user =$user;
    }*/

  public function createUserData(array $data)
  {
    dd('createUserData通ってます');
    throw new ModelNotFoundException;
  }

  public function getUserRecordByJson(int $id)
  {
    dd('getUserRecordByJson通ってます');
    throw new Exception('例外発生しています');

  }
  public function getUserLoginData()
    {
      return Auth::user();
    }

    public function getUserLoginId()
    {
      return Auth::id();
    }
}
