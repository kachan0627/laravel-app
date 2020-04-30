<?php
namespace App\Repositories\Profile;

use App\Models\profile;

class ProfileRepository implements ProfileRepositoryInterface
{
  public function getProfile(int $id= -1){
  /*  if($id == -1){
        return profile::get()->toJson();
      }else{
        return profile::find($id)->toJson();
      }*/
      return profile::where('user_id',$id)->first();
  }

}
