<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getProductsByCompanyId(string $idCompany, array $categories);
    public function getProductByUuid(string $uuid);
}
