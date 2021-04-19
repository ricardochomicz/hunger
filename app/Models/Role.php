<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

     /**
     * Permission not linked with this profile
     */

    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('id', function ($query) {
            $query->select('permission_id');
            $query->from('permission_role');
            $query->whereRaw("permission_role.role_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
        })
            ->paginate();

        return $permissions;
    }
}
