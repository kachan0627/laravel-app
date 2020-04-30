<?php
namespace App\Services\Profile;

use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Services\Profile\ProfileServiceInterface;
use App\Models\profile;

class ProfileService implements ProfileServiceInterface
{
  public function __construct(ProfileRepositoryInterface $profile_repository)
  {
    $this->profile_repository = $profile_repository;
  }
  //自己紹介のレコードが存在しない場合新しくレコードを作成する関数
  private function createSampleProfile(int $id)
  {
    $SampleProfile = new profile;
    $SampleProfile->user_id = $id;
    $SampleProfile->introduction = 'サンプルの自己紹介です';
    $SampleProfile->place ='東京';
    $SampleProfile->birthday ='1990-01-01';
    $this->profile_repository->createProfile($SampleProfile);
    return $SampleProfile;
  }
  //自己紹介の編集機能
  public function updateProfile(int $id,string $introduction,string $place,string $birthday)
  {
    //編集するプロフィールデータを取り出す。
    $UserProfile = $this->profile_repository->getProfile($id);
    if(!$UserProfile){
      //プロフィールデータが返却されなかった場合、新規作成する
      $UserProfile = new profile;
      $UserProfile->user_id = $id;
    }
    $UserProfile->introduction = $introduction;
    $UserProfile->place = $place;
    $UserProfile->birthday = $birthday;
    return $this->profile_repository->createProfile($UserProfile);
  }
//ユーザのプロフィールを取り出す。
  public function getProfileService(int $id)
  {
    $UserProfile = $this->profile_repository->getProfile($id);
    if(!$UserProfile){
      return $this->createSampleProfile($id);
    }
    return $this->profile_repository->getProfile($id);
  }



}
