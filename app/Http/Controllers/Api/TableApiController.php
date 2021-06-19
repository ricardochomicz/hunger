<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableApiController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function getTablesByCompany(CompanyFormRequest $request)
    {
        if(!$request->token_company)
        {
            return response()->json(['message' => 'Token Not Found'], 404);
        }
        $tables = $this->tableService->getTablesByCompanyUuid($request->token_company);
        return TableResource::collection($tables);
    }

    public function show(CompanyFormRequest $request, $identify)
    {
        if(!$table = $this->tableService->getTableByIdentify($identify))
        {
            return response()->json(['Table Not Found'], 404);
        }

        return new TableResource($table);
    }
}
