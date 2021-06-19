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
        $identify = $managerCompany->getCompanyIdentify();

        if ($identify)
            $model->company_id = $identify;
    }
}
