<?php
namespace Tests\Mock\Repositories;

use App\Repositories\Profile\ProfileRepositoryInterface;
use Exception;

class ProfileRepositoryTest implements ProfileRepositoryInterface
{
  public function getProfile(int $id=-1){
      print_r('getProfile通ってます');
      throw new Exception('getProfile例外発生してます');

  }
}
