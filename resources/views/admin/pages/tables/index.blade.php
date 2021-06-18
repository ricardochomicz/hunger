@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tables.index') }}">Mesas</a></li>
    </ol>
    <h1>Mesas</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" class="form-inline float-left" method="POST">
                @csrf
                <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa"
                    value="{{ $filters['identify'] ?? '' }}">
                <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
            <a href="{{ route('tables.create') }}" class="btn btn-sm btn-dark float-right"><i
                    class="fas fa-plus mr-1"></i>
                Novo</a>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($tables as $table)
                    <div class="col-sm-3">

                        <div class="card shadow border border-secondary bg-dark">
                            <div class="card-header bg-gray-dark"><span
                                    class="font-weight-bold">{{ $table->identify }}</span></div>
                            <div class="card-body">
                                <small>{{ $table->description }}</small>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar" data-container=".content"><i class="fas fa-pen"></i></a>
                              
                                <form action="{{route('tables.destroy', $table->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Deletar" data-container=".content"><i class="fas fa-trash-alt"></i></button>
                                </form>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="pagination-sm">

            @if (isset($filters))
                {!! $tables->appends($filters)->links() !!}
            @else
                {!! $tables->links() !!}
            @endif

        </div>
    </div>
@endsection
