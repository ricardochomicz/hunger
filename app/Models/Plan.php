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

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function search($filter)
    {
        return $this->where('name', 'LIKE', "%$filter%")->paginate();
    }

    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function ($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
            ->paginate();

        return $profiles;
    }
}
