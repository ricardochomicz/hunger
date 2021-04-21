@extends('adminlte::page')

@section('title', 'Cargos disponiveis do Usuário {$user->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" class="active">Cargos Usuário</a></li>
    </ol>
    <h1>Cargos disponiveis do Usuário - {{ $user->name }}</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.roles.available', $user->id) }}" class="form-inline float-left"
                method="POST">
                @csrf
                <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa"
                    value="{{ $filters['name'] ?? '' }}">
                <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-condensed table-borderless">
                <thead>
                    <tr class="table-active">
                        <th scope="col" width="50">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('users.roles.attach', $user->id) }}" method="POST">
                        @csrf

                        @foreach ($roles as $role)
                            <tr>
                                <td class="align-middle">
                                    <input type="checkbox" name="roles[]" id="customCheckbox1"
                                        value="{{ $role->id }}">
                                </td>
                                <td class="align-middle">{{ $role->name }}</td>
                                <td class="align-middle">{{ $role->description }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-sm btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
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
@stop
