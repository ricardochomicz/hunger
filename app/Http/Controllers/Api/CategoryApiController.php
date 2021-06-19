<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getCategoryByCompany(CompanyFormRequest $request)
    {
        if(!$request->token_company)
        {
            return response()->json(['message' => 'Token Not Found'], 404);
        }
        $categories = $this->categoryService->getCategoriesByCompanyUuid($request->token_company);
        return CategoryResource::collection($categories);
    }

    public function show(CompanyFormRequest $request, $uuid)
    {
        if(!$category = $this->categoryService->getCategoryByUuid($uuid))
        {
            return response()->json(['Category Not Found'], 404);
        }

        return new CategoryResource($category);
    }
}
