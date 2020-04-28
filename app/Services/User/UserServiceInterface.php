<?php

namespace App\Services\User;

use Illuminate\Http\Request;
//use App\Repositories\User\UserRepositoryInterface;
//use App\Models\User;
/**
 *ユーザ
 */
interface UserServiceInterface
{
  // code...
  public function DuplicationUserData(array $data);
  public function getUserLoginDataService();
  public function getUserLoginIdService();
  public function createUserDataService(array $data);
  public function getUserRecordService(int $id=-1);
  public function CheckLoginUser(string $LoginEmail,string $LoginPassword);


  //private function conversionUserClass(array $data);
}
