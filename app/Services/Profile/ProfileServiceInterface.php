<?php

namespace App\Services\Profile;


interface ProfileServiceInterface
{
  public function getProfileService(int $id);
  public function updateProfile(int $id,string $introduction,string $place,string $birthday);

}
