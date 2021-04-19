<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    protected $permission, $role;

    public function __construct(Permission $permission, Role $role)
    {   
        $this->permission = $permission;
        $this->role = $role;
    }

    public function permissions($idRole)
    {
        if (!$role = $this->role->find($idRole)) {
            return redirect()->back();
        }
        $permissions = $role->permissions()->paginate();

        return view('admin.pages.roles.permissions.index', compact('role', 'permissions'));
    }

    public function roles($idPermission)
    {
        if(!$permission = $this->permission->find($idPermission))
        {
            return redirect()->back();
        }
        $roles = $permission->roles()->paginate();

        return view('admin.pages.permissions.roles.roles', compact('permission', 'roles'));
    }

    public function permissionsAvailable(Request $request, $idRole)
    {
        if (!$role = $this->role->find($idRole)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');
       

        $permissions = $role->permissionsAvailable($request->filter);
        return view('admin.pages.roles.permissions.available', compact('role', 'permissions', 'filters'));
    }

    public function attachPermissionsRole(Request $request, $idRole)
    {
        if (!$role = $this->role->find($idRole)) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                ->back()
                ->with('warning', 'Selecione uma permissão');
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.permissions', $role->id);
    }

    public function detachPermissionRole($idRole, $idPermission)
    {
        $role = $this->role->find($idRole);
        $permission = $this->permission->find($idPermission);
        if (!$role || !$permission) {
            return redirect()->back();
        }

        $role->permissions()->detach($permission);

        return redirect()->route('roles.permissions', $role->id);
    }
}
