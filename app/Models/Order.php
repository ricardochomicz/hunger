<?php

namespace App\Models;

use App\Company\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, CompanyTrait;

    protected $fillable = [
        'identify',
        'uuid',
        'client_id',
        'table_id',
        'company_id',
        'total',
        'status',
        'comment'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
