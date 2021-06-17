<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{

    protected $entity;
    public function __construct(Company $company)
    {
        $this->entity = $company;
    }
    public function getAllCompanies()
    {
        return $this->entity->all();
    }
}
