<?php

namespace App\Repositories;

use App\Repositories\Contracts\TableRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TableRepository implements TableRepositoryInterface
{
    protected $table;

    public function __construct() {
        $this->table = 'tables';
    }

    public function getTablesByCompanyUuid(string $uuid)
    {
        return DB::table($this->table)
            ->join('companies', 'companies.id', '=', 'tables.company_id')
            ->where('companies.uuid', $uuid)
            ->select('tables.*')
            ->get();
    }

    public function getTablesByCompanyId(int $idCompany)
    {
        return DB::table($this->table)->where('company_id', $idCompany)->get();
    }

    public function getTableByIdentify(string $identify)
    {
        return DB::table($this->table)->where('identify', $identify)->first();
    }
}