<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    public function creating(Category $category)
    {
        $category->url = Str::kebab($category->name);
        $category->uuid = Str::uuid();
    }

    
    public function updating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }

}
