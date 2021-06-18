<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class CompanyService
{

    private $plan, $data = [];
    private $repository;

    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCompanies(int $per_page)
    {   
        return $this->repository->getAllCompanies($per_page);
    }

    public function getCompanyByUuid(string $uuid)
    {   
        return $this->repository->getCompanyByUuid($uuid);
    }


    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $company = $this->storeCompany();

        return $this->storeUser($company);
    }

    public function storeCompany()
    {
        $data = $this->data;

        return $this->plan->companies()->create([
            'cnpj' => $data['cnpj'],
            'name' => $data['empresa'],

            'email' => $data['email'],

            'subscription' => now(),
            'expires_at' => now()->addDays(7)
        ]);
    }

    public function storeUser($company)
    {
        $user = $company->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password'])
        ]);

        return $user;
    }
}
