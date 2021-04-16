<?php

namespace App\Company\Traits;

use App\Company\Observers\CompanyObserver;
use App\Company\Scopes\CompanyScope;

trait CompanyTrait

{
   /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::observe(CompanyObserver::class);

        static::addGlobalScope(new CompanyScope);
    }
}