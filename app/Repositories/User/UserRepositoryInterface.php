<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
  //インターフェースの設計・登録
  public function getUserRecordByJson(int $id);//User情報を返却する
  public function getUserLoginData();
  public function getUserLoginId();
  public function createUserData(array $data);
}
