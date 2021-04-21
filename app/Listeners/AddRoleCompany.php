<?php

namespace App\Listeners;

use App\Events\CompanyCreated;
use App\Models\Role;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddRoleCompany
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CompanyCreated $event)
    {
        $user = $event->user();
        //$company = $event->company();

        if(!$role = Role::first())
        {
            return;
        }
        $user->roles()->attach($role);

        return 1;
    }
}
