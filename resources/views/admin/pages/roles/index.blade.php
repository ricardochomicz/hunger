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
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-dark float-right"><i
                    class="fas fa-plus mr-1"></i> Novo</a>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-condensed table-borderless">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="colgroup" class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class="align-middle">{{ $role->name }}</td>
                            <td class="align-middle">{{ $role->description }}</td>
                            <td class="align-middle text-center">
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info btn-sm">Editar</a>
                                <a href="{{ route('roles.permissions', $role->id) }}"
                                    class="btn btn-default btn-sm" title="Permissões"><i class="fas fa-lock"></i></a>
                                    <a href="{{ route('roles.users', $role->id) }}"
                                        class="btn btn-default btn-sm" title="Usuários"><i class="fas fa-users"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

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
