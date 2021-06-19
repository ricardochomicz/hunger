<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class CategoryService
{

    protected $companyRepository, $categoryRepository;

    public function __construct(
        CompanyRepositoryInterface $companyRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->companyRepository = $companyRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoriesByCompanyUuid(string $uuid)
    {
        $company = $this->companyRepository->getCompanyByUuid($uuid);

        return $this->categoryRepository->getCategoriesByCompanyId($company->id);
    }

    public function getCategoryByUrl(string $url)
    {
        return $this->categoryRepository->getCategoryByUrl($url);
    }
}
