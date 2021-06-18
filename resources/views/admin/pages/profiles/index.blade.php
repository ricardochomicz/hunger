@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>
    <h1>Perfis</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" class="form-inline float-left" method="POST">
                @csrf
                <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa"
                    value="{{ $filters['name'] ?? '' }}">
                <button class="btn btn-sm btn-default" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
            <a href="{{ route('profiles.create') }}" class="btn btn-sm btn-default float-right"><i
                    class="fas fa-plus mr-1"></i> Novo</a>
        </div>
        <div class="card-body">

            <div class="row">
                @foreach ($profiles as $profile)
                    <div class="col-sm-3">

                        <div class="card shadow border border-secondary">
                            <div class="card-header bg-gray-dark"><span class="font-weight-bold">{{ $profile->name }}</span>
                            </div>
                            <div class="card-body">
                                <small>{{ $profile->description }}</small>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-secondary btn-sm"
                                    data-toggle="tooltip" title="Editar" data-container=".content"><i
                                        class="fas fa-pen"></i></a>
                               
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-secondary btn-sm"
                                    data-toggle="tooltip" title="Perfis" data-container=".content"><i
                                        class="fas fa-id-badge"></i></a>

                                <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip"
                                        title="Deletar" data-container=".content"><i class="fas fa-trash-alt"></i></button>
                                </form>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
        <div class="card-footer pagination-sm">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@endsection
