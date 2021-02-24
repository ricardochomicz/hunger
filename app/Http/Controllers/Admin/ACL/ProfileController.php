<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    protected $repository;
    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }


    public function index()
    {
        $profiles = $this->repository->paginate();

        return view('admin.pages.profiles.index', compact('profiles'));
    }


    public function create()
    {
        return view('admin.pages.profiles.create');
    }


    public function store(StoreUpdateProfile $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }


    public function show($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.profiles.show', compact('profile'));
    }


    public function edit($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.profiles.edit', compact('profile'));
    }


    public function update(StoreUpdateProfile $request, $id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }
        $profile->update($request->all());
        return redirect()->route('profiles.index');
    }


    public function destroy($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }
        $profile->delete();
        return redirect()->route('profiles.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $profiles = $this->repository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query->where('name', $request->filter)
                        ->orWhere('description', 'LIKE', "%{$request->filter}%");
                }
            })
            ->paginate();
        return view('admin.pages.profiles.index', compact('profiles', 'filters'));    
    }
}
