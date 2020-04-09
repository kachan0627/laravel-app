<?php
namespace App\Repositories\User;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
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

  public function getUserRecordByJson($id =-1)
  {
    if($id == -1){
      return User::get()->toJson();
    }else{
      return User::find($id)->toJson();
    }
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
