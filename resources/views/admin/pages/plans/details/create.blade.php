@extends('adminlte::page')

@section('title', 'Adicionar Detalhe Plano')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->id)}}">{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{route('details.plan.index', $plan->id)}}">Detalhes</a></li>
    <li class="breadcrumb-item active"><a href="{{route('details.plan.create', $plan->id)}}">Detalhes</a></li>
</ol>
<h1>Adicionar Detalhe - {{$plan->name}}</h1>


@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('details.plan.create', $plan->id)}}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i> Novo</a>
    </div>
    <div class="card-body">
        <form action="{{route('details.plan.store', $plan->id)}}" method="post">
            @include('admin.pages.plans.details._partials.form')
        </form>

    </div>
</div>
@stop