<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'products';
    }

    public function getProductsByCompanyId(string $idCompany, array $categories)
    {
        return DB::table($this->table)
            ->join('category_product', 'category_product.product_id', '=', 'products.id')
            ->join('categories', 'category_product.category_id', '=', 'categories.id')
            ->where('products.company_id', $idCompany)
            ->where('categories.company_id', $idCompany)
            ->where(function ($query) use ($categories) {
                if($categories != null){
                    $query->whereIn('categories.url', $categories);
                }        
            })
            ->get();
    }
}
