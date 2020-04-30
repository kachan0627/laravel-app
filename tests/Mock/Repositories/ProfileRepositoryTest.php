<?php
namespace Tests\Mock\Repositories;

use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Models\profile;
use Exception;

class ProfileRepositoryTest implements ProfileRepositoryInterface
{
  public function getProfile(int $id){
      print_r('getProfile通ってます');
      throw new Exception('getProfile例外発生してます');

  }
  public function createProfile(profile $Profile){
    throw new Exception('createProfile例外発生してます');
  }
}
