<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($idPlan)
    {
        if(!$plan = $this->plan->where('id', $idPlan)->first())
        {
            return redirect()->back();
        }
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);
    }

    public function create($idPlan)
    {
        
        if(!$plan = $this->plan->where('id', $idPlan)->first())
        {
            return redirect()->back();
        }
        
        return view('admin.pages.plans.details.create',[
            'plan' => $plan
        ]); 
    }

    public function store(StoreUpdateDetailPlan $request, $idPlan)
    {
        if(!$plan = $this->plan->where('id', $idPlan)->first())
        {
            return redirect()->back();
        }
        //$data = $request->all();
        //$data['plan_id'] = $plan->id;
        $plan->details()->create($request->all());
        toast('Detalhe cadastrado com sucesso', 'success')->position('bottom-end');    
        return redirect()->route('details.plan.index', $plan->id);
    }

    public function edit($idPlan, $idDetail)
    {
        $plan = $this->plan->where('id', $idPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.edit',[
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    public function update(StoreUpdateDetailPlan $request, $idPlan, $idDetail)
    {
        $plan = $this->plan->where('id', $idPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        //$data = $request->all();
        //$data['plan_id'] = $plan->id;
        $detail->update($request->all());
        toast('Detalhe atualizado com sucesso', 'info')->position('bottom-end');
        return redirect()->route('details.plan.index', $plan->id);
    }

    public function show($idPlan, $idDetail)
    {
        $plan = $this->plan->where('id', $idPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.show',[
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    public function destroy($idPlan, $idDetail)
    {
        $plan = $this->plan->where('id', $idPlan)->first();
        $detail = $this->repository->find($idDetail);
        if(!$plan || !$detail)
        {
            return redirect()->back();
        }
        //$data = $request->all();
        //$data['plan_id'] = $plan->id;
        $detail->delete();
        
        toast('Detalhe deletado com sucesso', 'info')->position('bottom-end');
        return redirect()
        ->route('details.plan.index', $plan->id)
        ->with('message', 'Registro deletado com sucesso!');
    }
}
