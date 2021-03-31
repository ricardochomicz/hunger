@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>
    <h1>Permissões</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" class="form-inline float-left" method="POST">
                @csrf
                <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa"
                    value="{{ $filters['name'] ?? '' }}">
                <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
            <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-dark float-right"><i
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="align-middle">{{ $permission->name }}</td>
                            <td class="align-middle">{{ $permission->description }}</td>
                            <td class="align-middle text-center">
                                <a href="{{ route('permissions.show', $permission->id) }}"
                                    class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                    class="btn btn-info btn-sm">Editar</a>
                                <a href="{{ route('permission.profiles', $permission->id) }}"
                                    class="btn btn-default btn-sm">Perfil</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer pagination-sm">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@endsection
