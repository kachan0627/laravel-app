<?php
namespace App\Repositories\User;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{

//ユーザを作成する
  public function createUserData(array $data)
  {
    return User::create([
            'acount_name' => $data['acount_name'],
            'nick_name' => $data['nick_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
  }

//ユーザ情報を取り出す
  public function getUserRecord($id)
  {
    if($id == -1){
      return User::get();
    }else{
      $findUserData = User::find($id);
      if($findUserData==NULL){
        return false;
      }else{
        return $findUserData;
      }
    }
  }
//ログインしているユーザー情報を取り出す
  public function getUserLoginData()
  {
    return Auth::user();
  }
//ログインしているユーザーIDを取り出す
  public function getUserLoginId()
  {
    return Auth::id();
  }
  //email情報からユーザ情報を取り出す。
  public function getUserRecordUsingEmail(string $email){
      $loginUser = User::where('email',$email)->first();
      //dd($loginUser);
      if($loginUser==NULL){
        Log::debug('ユーザは存在しません');
        throw new Exception('Error-getUserRecordUsingEmail');
      }else{
        Log::debug('ユーザは存在します');
        return $loginUser;

      }

  }


}
