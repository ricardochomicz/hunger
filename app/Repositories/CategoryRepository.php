<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{

    protected $table;

    public function __construct()
    {
        $this->table = 'categories';
    }

    public function getCategoriesByCompanyUuid(string $uuid)
    {
        return DB::table($this->table)
            ->join('companies', 'companies.id', '=', 'categories.company_id')
            ->where('companies.uuid', $uuid)
            ->select('categories.*')
            ->get();
    }

    public function getCategoriesByCompanyId(int $idCompany)
    {
        return DB::table($this->table)->where('company_id', $idCompany)->get();
    }
}
