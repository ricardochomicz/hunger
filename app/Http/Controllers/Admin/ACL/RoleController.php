<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRoles;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    protected $repository;

    public function __construct(Role $role)
    {
        $this->repository = $role;
        $this->middleware('can:Cargos');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->repository->paginate();
        return view('admin.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRoles $request)
    {
        $this->repository->create($request->all());
        toast('Cargo cadastrado com sucesso', 'success')->position('bottom-end');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$role = $this->repository->find($id))
        {
            return redirect()->back();
        }
        return view('admin.pages.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$role = $this->repository->find($id))
        {
            return redirect()->back();
        }

        return view('admin.pages.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRoles $request, $id)
    {
        if(!$role = $this->repository->find($id))
        {
            return redirect()->back();
        }
        $role->update($request->all());
        toast('Cargo atualizado com sucesso', 'info')->position('bottom-end');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$role = $this->repository->find($id))
        {
            return redirect()->back();
        }

        $role->delete();
        toast('Cargo deletado com sucesso', 'info')->position('bottom-end');
        return redirect()->route('roles.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $roles = $this->repository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query->where('name', $request->filter)
                        ->orWhere('description', 'LIKE', "%{$request->filter}%");
                }
            })
            ->paginate();
        return view('admin.pages.roles.index', compact('roles', 'filters'));    
    }
}
