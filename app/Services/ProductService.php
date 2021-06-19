<?php

namespace App\Services;

use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductService
{
    protected $companyRepository, $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CompanyRepositoryInterface $companyRepository
    ) {
        $this->companyRepository = $companyRepository;
        $this->productRepository = $productRepository;
    }

    public function getProductsByCompanyUuid(string $uuid)
    {
        $company = $this->companyRepository->getCompanyByUuid($uuid);

        return $this->productRepository->getProductsByCompanyId($company->id);
    }
}
