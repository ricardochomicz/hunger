<?php

namespace App\Company;

use App\Models\Company;

class ManagerCompany
{
  public function getCompanyIdentify()
  {
    return auth()->check() ? auth()->user()->company_id : '';
  }

  public function getCompany(): Company
  {
    return auth()->check() ? auth()->user()->company : '';
  }


  /**
   * verifica se e-mail está no array config/company
   */
  public function isAdmin(): bool
  {
    return in_array(auth()->user()->email, config('company.admins'));
  }
}
