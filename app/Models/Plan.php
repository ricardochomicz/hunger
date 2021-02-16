<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'url'];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function search($filter)
    {
        return $this->where('name', 'LIKE', "%$filter%")->paginate();
    }
}
