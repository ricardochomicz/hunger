@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
    </ol>
    <h1>Cargos</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('roles.search') }}" class="form-inline float-left" method="POST">
                @csrf
                <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa"
                    value="{{ $filters['name'] ?? '' }}">
                <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i>
                Novo</a>
        </div>
        <div class="card-body">

            <div class="row">
                @foreach ($roles as $role)
                    <div class="col-sm-3">

                        <div class="card shadow border border-secondary bg-dark">
                            <div class="card-header bg-gray-dark"><span class="font-weight-bold">{{ $role->name }}</span>
                            </div>
                            <div class="card-body">
                                <small>{{ $role->description }}</small>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"
                                    data-toggle="tooltip" title="Editar" data-container=".content"><i
                                        class="fas fa-pen"></i></a>
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-default btn-sm"
                                    title="Permissões" data-toggle="tooltip" title="Permissões" data-container=".content"><i
                                        class="fas fa-lock"></i></a>
                                <a href="{{ route('roles.users', $role->id) }}" class="btn btn-default btn-sm"
                                    data-toggle="tooltip" title="Usuários" data-container=".content"><i
                                        class="fas fa-users"></i></a>

                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
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
        <div class="card-footer pagination-sm">

            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif

        </div>
    </div>
@endsection
