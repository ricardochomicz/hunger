@extends('adminlte::page')

@section('title', 'Usuários do Cargol')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Usuários do Cargo</a></li>
    </ol>
    <h1>Usuários do Cargo - {{ $role->name }}</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('roles.permissions.available', $role->id) }}" class="btn btn-sm btn-dark float-right"><i
                    class="fas fa-plus mr-1"></i> Novo</a>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-condensed table-borderless">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="colgroup" class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle text-center">
                                <a href="{{ route('users.roles.detach', [$role->id, $user->id]) }}"
                                    class="btn btn-danger btn-sm">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer pagination-sm">

            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
            @endif

        </div>
    </div>
@stop
