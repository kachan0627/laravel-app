<?php
namespace App\Repositories\Profile;

use App\Models\profile;

class ProfileRepository implements ProfileRepositoryInterface
{
  public function getProfile(int $id){
      $profileData = profile::where('user_id',$id)->first();
      if($profileData ==NULL){
        return false;
      }else{
      return $profileData;
    }
  }

  public function createProfile(profile $Profile){
    $Profile->save();
    return true;
  }
}
