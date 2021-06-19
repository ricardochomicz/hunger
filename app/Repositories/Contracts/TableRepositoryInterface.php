<?php

namespace App\Repositories\Contracts;

interface TableRepositoryInterface
{
    public function getTablesByCompanyUuid(string $uuid);
    public function getTablesByCompanyId(int $idCompany);
    public function getTableByIdentify(string $identify);
}
