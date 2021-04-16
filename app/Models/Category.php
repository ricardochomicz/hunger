<?php

namespace App\Models;

use App\Company\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, CompanyTrait;

    protected $fillable = ['name', 'url', 'description', 'company_id'];

   public function company()
   {
       return $this->belongsTo(Company::class);
   }

   public function products()
   {
       return $this->belongsToMany(Product::class);
   }
}
