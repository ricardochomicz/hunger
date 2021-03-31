<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();
        $plan->companies()->create([
            'cnpj' => 10805615000149,
            'name' => 'PGTelecom',
            'url' => 'pgtelecom',
            'email' => 'pgtelecom@email.com'
        ]);
    }
}
