<?php
namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
  public function __construct(UserRepositoryInterface $user_repository)
  {
    $this->user_repository = $user_repository;
  }
  //ユーザ登録の際にデータの重複がないかチェックする関数
  //引数に追加したいUserModelClass
  //被りがある場合はexceptionを発生させる
  public function DuplicationUserData()
  {
    //$this->user_repository->getUserRecord(-1);
    $UserTmp[] = new User();
    $UserTmp = $this->user_repository->getUserRecord(-1);
    //dd($UserTmp[1]->acount_name);
    for($ArrayCount=0;$ArrayCount<count($UserTmp);$ArrayCount++){
      if($UserTmp[$ArrayCount]->acount_name == 'test_userkk'){
        dd($UserTmp[$ArrayCount]->acount_name);
      }
    }
    dd('ユーザーの被りありません');
  }

  public function getUserLoginDataService(){
    return $this->user_repository->getUserLoginData();
  }
  public function getUserLoginIdService(){
    return $this->user_repository->getUserLoginId();
  }
  public function createUserDataService(array $data){
    return $this->user_repository->createUserData($data);
  }
  public function getUserRecordService(int $id=-1){
    return $this->user_repository->getUserRecord($id);
  }

}
