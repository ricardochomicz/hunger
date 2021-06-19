<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Company::first();
        $company->users()->create([
            'name' => 'Ricardo Chomicz',
            'email' => 'ricardo.chomicz@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
