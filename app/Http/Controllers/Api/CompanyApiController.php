<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyApiController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService) {
        $this->companyService = $companyService;
    }

    public function index(Request $request)
    {
        $per_page = (int) $request->get('per_page', 15);
        $companies = $this->companyService->getAllCompanies($per_page);
        return CompanyResource::collection($companies);
    }

    public function show($uuid)
    {
        if(!$company = $this->companyService->getCompanyByUuid($uuid)){
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new CompanyResource($company);
    }
}
