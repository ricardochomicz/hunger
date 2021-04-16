<?php

namespace App\Models;

use App\Company\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, CompanyTrait;

    protected $fillable = ['name', 'url', 'price', 'description', 'image'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function categoriesAvailable($filter = null)
    {
        $categories = Category::whereNotIn('id', function ($query) {
            $query->select('category_product.category_id');
            $query->from('category_product');
            $query->whereRaw("category_product.product_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('categories.name', 'LIKE', "%{$filter}%");
        })
            ->paginate();

        return $categories;
    }
}
