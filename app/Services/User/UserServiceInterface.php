<?php

namespace App\Services\User;

use App\Repositories\User\UserRepositoryInterface;
/**
 *ユーザ
 */
interface UserServiceInterface
{
  // code...
  public function DuplicationUserData();
  public function getUserLoginDataService();
  public function getUserLoginIdService();
  public function createUserDataService(array $data);
  public function getUserRecordService(int $id=-1);
}
