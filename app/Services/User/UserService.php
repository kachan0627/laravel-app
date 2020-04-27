<?php
namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Http\Request;

class UserService implements UserServiceInterface
{
  public function __construct(UserRepositoryInterface $user_repository)
  {
    $this->user_repository = $user_repository;
  }

  //arrayからmodelクラスを作成し、返却する
  private function conversionUserClass(array $data)
  {
    $TestTmp = new User();
    $TestTmp->acount_name = $data['acount_name'];
    $TestTmp->nick_name=$data['nick_name'];
    $TestTmp->email = $data['email'];
    $TestTmp->password = Hash::make($data['password']);
    return $TestTmp;
  }

  //ユーザ登録の際にデータの重複がないかチェックする関数
  //引数は会員登録情報
  //被りがある場合はexceptionを発生させる
  //重複がない場合はユーザー登録を行う
  public function DuplicationUserData(array $data)
  {
    //$this->user_repository->getUserRecord(-1);
    $UserTmp[] = new User();//DBの全ユーザ情報格納する変数
    $UserTmp = $this->user_repository->getUserRecord(-1);//DBの全ユーザ情報格納する-1で全データ呼び出し
    $TestUser = new User();
    $TestUser = $this->conversionUserClass($data);//arrayデータをユーザモデルに変換。
    for($ArrayCount = 0; $ArrayCount < count($UserTmp); $ArrayCount++)
    {
      if($UserTmp[$ArrayCount]->acount_name == $TestUser->acount_name)
      {
        //dd($UserTmp[$ArrayCount]->acount_name);
        throw new Exception('既にユーザが存在してます');
      }
    }
    return $this->user_repository->createUserData($data);
  }

  //ログインするための情報がDBのユーザ情報と一致しているか確認する関数
  public function CheckLoginUser(Request $request)
  {
    //全てのユーザ情報を$AllUserList[]に格納
    $AllUserList[] = new User();
    $AllUserList = $this->user_repository->getUserRecord(-1);
    //ログインする際に入力された情報を格納
    $LoginEmail = $request->input('email');
    $LoginPassword = $request->input('password');
    /*for($ArrayCount = 0; $ArrayCount < count($AllUserList); $ArrayCount++)
    {
      if(){

      }

    }*/
  }

  public function getUserLoginDataService()
  {
    return $this->user_repository->getUserLoginData();
  }
  public function getUserLoginIdService()
  {
    return $this->user_repository->getUserLoginId();
  }
  public function createUserDataService(array $data)
  {

    return $this->user_repository->createUserData($data);
  }
  public function getUserRecordService(int $id=-1)
  {
    return $this->user_repository->getUserRecord($id);
  }

  //検索機能
  /*public function SerchUserData()
  {

  }*/

}
