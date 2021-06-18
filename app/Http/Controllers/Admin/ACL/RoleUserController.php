<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    protected $role, $user;

    public function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;

        $this->middleware('can:Cargos');
    }


    public function roles($idUser)
    {
        if(!$user = $this->user->find($idUser))
        {
            return redirect()->back();
        }

        $roles = $user->roles()->paginate();

        return view('admin.pages.users.roles.roles', compact('user', 'roles'));
    }

    public function users($idRole)
    {
        if (!$role = $this->role->find($idRole)) {
            return redirect()->back();
        }
        $users = $role->users()->paginate();

        return view('admin.pages.roles.users.users', compact('role', 'users'));
    }

    

    public function rolesAvailable(Request $request, $idUser)
    {
        if (!$user = $this->user->find($idUser)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');
       

        $roles = $user->rolesAvailable($request->filter);
        return view('admin.pages.users.roles.available', compact('roles', 'user', 'filters'));
    }

    public function attachRolesUser(Request $request, $idUser)
    {
        if (!$user = $this->user->find($idUser)) {
            return redirect()->back();
        }

        if (!$request->roles || count($request->roles) == 0) {
            return redirect()
                ->back()
                ->with('warning', 'Selecione um Cargo');
        }

        $user->roles()->attach($request->roles);
        toast('Cargo vinculado com sucesso', 'success')->position('bottom-end');
        return redirect()->route('users.roles', $user->id);
    }

    public function detachRolesUser($idRole, $idUser)
    {
        $role = $this->role->find($idRole);
        $user = $this->user->find($idUser);
        if (!$role || !$user) {
            return redirect()->back();
        }

        $role->users()->detach($user);
        toast('Cargo desvinculado com sucesso', 'info')->position('bottom-end');
        return redirect()->route('roles.users', $role->id);
    }
}
