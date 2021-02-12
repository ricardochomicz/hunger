<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }

    
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }

    
}
