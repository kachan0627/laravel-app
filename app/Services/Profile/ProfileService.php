<?php
namespace App\Services\Profile;

use App\Repositories\Profile\ProfileRepositoryInterface;

class ProfileService implements ProfileServiceInterface
{
  public function __construct(ProfileRepositoryInterface $profile_repository)
  {
    $this->profile_repository = $profile_repository;
  }


  public function getProfileService(int $id){
    return $this->profile_repository->getProfile($id);
  }

}
