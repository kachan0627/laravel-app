<?php
namespace App\Repositories\Profile;

use App\Models\profile;

interface ProfileRepositoryInterface
{
  public function getProfile(int $id);
  public function createProfile(profile $SampleProfile);
}
