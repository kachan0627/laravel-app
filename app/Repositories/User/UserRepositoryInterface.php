<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
  //インターフェースの設計・登録
  public function getUserLoginData();
  public function getUserLoginId();
  public function createUserData(array $data);
  public function getUserRecord(int $id);
}
