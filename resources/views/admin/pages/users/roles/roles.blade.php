@extends('adminlte::page')

@section('title', 'Cargos do Usuário')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
    </ol>
    <h1>Cargos do Usuário - {{ $user->name }}</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-sm btn-dark float-right"><i
                    class="fas fa-plus mr-1"></i> Novo</a>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-condensed table-borderless">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Nome</th>
                        <th scope="colgroup" class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class="align-middle">{{ $role->name }}</td>
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
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif

        </div>
    </div>
@stop
