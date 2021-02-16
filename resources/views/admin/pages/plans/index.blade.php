@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
</ol>
<h1>Planos</h1>


@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{route('plans.search')}}" class="form-inline float-left" method="POST">
            @csrf
            <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa" value="{{$filters['name'] ?? ''}}">
            <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
        </form>
        <a href="{{route('plans.create')}}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i> Novo</a>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                <tr>
                    <td class="align-middle">{{$plan->name}}</td>
                    <td class="align-middle">R$ {{ number_format($plan->price, 2,',','.') }}</td>
                    <td class="align-middle">{{$plan->description}}</td>
                    <td class="align-middle">
                        <a href="{{route('details.plan.index', $plan->id)}}" class="btn btn-secondary btn-sm"><i class="fas fa-tags"></i></a>
                        <a href="{{route('plans.show', $plan->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-binoculars"></i></a>
                        <a href="{{route('plans.edit', $plan->id)}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="card-footer pagination-sm">

        @if (isset($filters))
        {!! $plans->appends($filters)->links() !!}
        @else
        {!! $plans->links() !!}
        @endif

    </div>
</div>
@stop