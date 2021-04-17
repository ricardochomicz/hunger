<?php

namespace App\Models\Traits;

trait UserACLTrait
{
  public function permissions()
  {
    $company = $this->company()->first();
    $plan = $company->plan;

    $permissions = [];

    foreach ($plan->profiles as $profile) {
      foreach ($profile->permissions as $permission) {
        array_push($permissions, $permission->name);
      }
      $permissions[] = $profile->permissions;
    }

    return $permissions;
  }

  public function hasPermission(string $permissionName): bool
  {
    return in_array($permissionName, $this->permissions());
  }

  public function isAdmin(): bool
  {
    return in_array($this->email, config('acl.admins'));
  }

  public function isCompany(): bool
  {
    return !in_array($this->email, config('acl.admins'));
  }
}
