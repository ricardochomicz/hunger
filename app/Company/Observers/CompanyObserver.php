<?php

namespace App\Company\Observers;

use App\Company\ManagerCompany;
use Illuminate\Database\Eloquent\Model;

class CompanyObserver
{
  /**
   * Handle the Company "creating" event.
   *
   * @param  \Illuminate\Database\Eloquent\Model  $model
   * @return void
   */
  public function creating(Model $model)
  {
    $managerCompany = app(ManagerCompany::class);
    $model->company_id = $managerCompany->getCompanyIdentify();
  }
}
