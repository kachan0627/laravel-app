<?php
namespace App\Repositories\User;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{


  public function createUserData(array $data)
  {
    return User::create([
            'acount_name' => $data['acount_name'],
            'nick_name' => $data['nick_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
  }


  public function getUserRecord($id)
  {
    if($id == -1){
      return User::get();
    }else{
      return User::find($id);
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
