<?php

namespace App\Repositories\Contracts;

interface CompanyRepositoryInterface
{
    public function getAllCompanies(int $per_page);
    public function getCompanyByUuid(string $uuid);
}
