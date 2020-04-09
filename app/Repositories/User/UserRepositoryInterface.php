<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
  //インターフェースの設計・登録
  public function getUserRecordByJson($id =-1);
}
