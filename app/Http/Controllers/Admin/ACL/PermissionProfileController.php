<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }
        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.index', compact('profile', 'permissions'));
    }

    public function profiles($idPermission)
    {
        if(!$permission = $this->permission->find($idPermission))
        {
            return redirect()->back();
        }
        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', compact('permission', 'profiles'));
    }


    public function permissionsAvailable(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');
       

        $permissions = $profile->permissionsAvailable($request->filter);
        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                ->back()
                ->with('warning', 'Selecione uma permissão');
        }

        $profile->permissions()->attach($request->permissions);
        toast('Permissão vinculada com sucesso', 'success')->position('bottom-end');
        return redirect()->route('profiles.permissions', $profile->id);
    }

    public function detachPermissionProfile($idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);
        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);
        toast('Permissão desvinculada com sucesso', 'info')->position('bottom-end');
        return redirect()->route('profiles.permissions', $profile->id);
    }
}
