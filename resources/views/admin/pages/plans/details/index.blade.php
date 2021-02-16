@extends('adminlte::page')

@section('title', 'Detalhes Plano')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->id)}}">{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{route('details.plan.index', $plan->id)}}">Detalhes</a></li>
</ol>
<h1>Detalhes do Plano</h1>


@stop

@section('content')
@include('admin.includes.alerts')
<div class="card">    
    <div class="card-header">
        <a href="{{route('details.plan.create', $plan->id)}}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i> Novo</a>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="150">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                <tr>
                    <td class="align-middle">{{$detail->name}}</td>
                    <td>
                        <a href="{{route('details.plan.show', [$plan->id, $detail->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-binoculars"></i></a>
                        <a href="{{route('details.plan.edit', [$plan->id, $detail->id])}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="card-footer pagination-sm">
        @if (isset($filters))
        {!! $details->appends($filters)->links() !!}
        @else
        {!! $details->links() !!}
        @endif 
    </div>
</div>
@stop