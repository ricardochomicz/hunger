<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getCategoriesByCompanyUuid(string $uuid);
    public function getCategoriesByCompanyId(int $idCompany);
    public function getCategoryByUuid(string $uuid);
}
