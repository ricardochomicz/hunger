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
    public function getAllCompanies($per_page)
    {
        return $this->entity->paginate($per_page);
    }

    public function getCompanyByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->first();
    }
}
