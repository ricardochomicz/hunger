@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    </ol>
    <h1>Planos</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" class="form-inline float-left" method="POST">
                @csrf
                <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa"
                    value="{{ $filters['name'] ?? '' }}">
                <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
            <a href="{{ route('plans.create') }}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i>
                Novo</a>
        </div>
        <div class="card-body">

            <div class="row">
                @foreach ($plans as $plan)
                    <div class="col-sm-3">

                        <div class="card shadow border border-secondary bg-dark">
                            <div class="card-header bg-gray-dark"><span class="font-weight-bold">{{ $plan->name }}</span>
                            </div>
                            <div class="card-body">
                                <small>{{ $plan->description }}</small>
                                <p class="h3">R$ {{ number_format($plan->price, 2, ',', '.') }} </p>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-primary btn-sm"
                                    data-toggle="tooltip" title="Editar" data-container=".content"><i
                                        class="fas fa-pen"></i></a>
                                <a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-default btn-sm"
                                    title="Detalhes" data-toggle="tooltip" title="Permissões" data-container=".content"><i
                                        class="fas fa-file-alt"></i></a>
                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning btn-sm"
                                    data-toggle="tooltip" title="Perfis" data-container=".content"><i
                                        class="fas fa-id-badge"></i></a>

                                <form action="{{ route('plans.destroy', $plan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                        title="Deletar" data-container=".content"><i class="fas fa-trash-alt"></i></button>
                                </form>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

                
            
        </div>
        <div class="pagination-sm">

            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif

        </div>
    </div>
@endsection
