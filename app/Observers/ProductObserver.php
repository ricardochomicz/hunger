<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->url = Str::kebab($product->name);
    }

    
    public function updating(Product $product)
    {
        $product->url = Str::kebab($product->name);
    }
}
