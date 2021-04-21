<?php

namespace App\Models\Traits;

use App\Models\Company;

trait UserACLTrait
{
  public function permissions(): array
  {
    $permissionsPlan = $this->permissionsPlan();
    $permissionsRole = $this->permissionsRole();
    $permissions = [];

    foreach ($permissionsRole as $permission) {
      if (in_array($permission, $permissionsPlan)) {
        array_push($permissions, $permission);
      }
    }

    return $permissions;
  }

  public function permissionsPlan(): array
  {
    //$company = $this->company()->first();
    //$plan = $company->plan;

    $company = Company::with('plan.profiles.permissions')->where('id', $this->company_id)->first();
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

  public function permissionsRole(): array
  {
    $roles = $this->roles()->with('permissions')->get();
    $permissions = [];
    foreach ($roles as $role) {
      foreach ($role->permissions as $permission) {
        array_push($permissions, $permission->name);
      }
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
