<?php
namespace Tests\Mock\Repositories;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\User\UserRepositoryInterface;

class UserRepositoryTest implements UserRepositoryInterface
{
  public function __construct(User $user){
      $this->user =$user;
    }

  public function createUserData(array $data)
  {
    return User::create([
            'acount_name' => $data['acount_name'],
            'nick_name' => $data['nick_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            ]);
  }

  public function getUserRecordByJson($id=-1)
  {
    //dd(User::get()->toJson());
   /*if($id == -1){
    return User::get()->toJson();
  }else{
    return User::find($id)->toJson();
  }*/
    print_r('リポジトリ通ってます');
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
