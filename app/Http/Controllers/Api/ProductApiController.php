<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyFormRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProductsByCompany(CompanyFormRequest $request)
    {
        if(!$request->token_company)
        {
            return response()->json(['message' => 'Token Not Found'], 404);
        }
        $products = $this->productService->getProductsByCompanyUuid($request->token_company);
        return ProductResource::collection($products);
    }
}
