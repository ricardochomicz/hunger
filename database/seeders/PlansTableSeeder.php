<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businnes = Plan::create([
            'name' => 'Businnes',
            'url' => 'businnes',
            'price' => 499.99,
            'description' => 'Plano Master'
        ]);

        $free = Plan::create([
            'name' => 'Free',
            'url' => 'free',
            'price' => 0.00,
            'description' => 'Plano Free'
        ]);
    }
}
