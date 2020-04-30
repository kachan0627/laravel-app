<?php
namespace App\Services\Profile;

use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Services\Profile\ProfileServiceInterface;

class ProfileService implements ProfileServiceInterface
{
  public function __construct(ProfileRepositoryInterface $profile_repository)
  {
    $this->profile_repository = $profile_repository;
  }
  //自己紹介を作成する関数
  private function createSampleProfile(int $id)
  {
    $SampleProfile = new Profile;
    $SampleProfile->user_id = $id;
    $SampleProfile->introduction = 'サンプルの自己紹介です';
    $SampleProfile->place ='東京';
    $SampleProfile->birthday ='1990-01-01';
    return $SampleProfile;
  }

  public function getProfileService(int $id)
  {
    return $this->profile_repository->getProfile($id);
  }



}
