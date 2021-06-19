<?php

namespace App\Services;

use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Contracts\TableRepositoryInterface;

class TableService
{
    protected $companyRepository, $tableRepository;

    public function __construct(
        CompanyRepositoryInterface $companyRepository,
        TableRepositoryInterface $tableRepository
    ) {
        $this->companyRepository = $companyRepository;
        $this->tableRepository = $tableRepository;
    }

    public function getTablesByCompanyUuid(string $uuid)
    {
        $company = $this->companyRepository->getCompanyByUuid($uuid);

        return $this->tableRepository->getTablesByCompanyId($company->id);
    }

    public function getTableByUuid(string $uuid)
    {
        return $this->tableRepository->getTableByUuid($uuid);
    }
}