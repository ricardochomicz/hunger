<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCompany;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    protected $repository;

    public function __construct(Company $company)
    {
        $this->repository = $company;

        $this->middleware('can:company');
    }

    public function index()
    {
        $companies = $this->repository->latest()->paginate();

        return view('admin.pages.companies.index', compact('companies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$company = $this->repository->with('plan')->find($id))
        {
            return redirect()->back();
        }

        return view('admin.pages.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$company = $this->repository->find($id))
        {
            return redirect()->back();
        }
        return view('admin.pages.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ReqStoreUpdateProductuest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCompany $request, $id)
    {
        if(!$company = $this->repository->find($id))
        {
            return redirect()->back();
        }
        $data = $request->all();
        
        if($request->hasFile('logo') && $request->logo->isValid())
        {
            if(Storage::exists($company->logo)){
                Storage::delete($company->logo);
            }

            $data['logo'] = $request->logo->store("companies/{$company->uuid}");
        }
        $company->update($data);

        return redirect()->route('companies.index');
    }


}
