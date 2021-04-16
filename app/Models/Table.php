<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['identify', 'description', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
