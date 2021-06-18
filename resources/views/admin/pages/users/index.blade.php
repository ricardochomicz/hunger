@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
    </ol>
    <h1>Usuários</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.search') }}" class="form-inline float-left" method="POST">
                @csrf
                <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa"
                    value="{{ $filters['name'] ?? '' }}">
                <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i>
                Novo</a>
        </div>
        <div class="card-body table-responsive">

                <table class="table table-condensed dataTable dataTable table-borderless dtr-inline">
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
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Ver" data-container=".content"><i
                                        class="fas fa-eye"></i></a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar" data-container=".content"><i
                                        class="fas fa-pen"></i></a>
                                    <a href="{{ route('users.roles', $user->id) }}"
                                        class="btn btn-default btn-sm" data-toggle="tooltip" title="Cargos" data-container=".content"><i class="fas fa-lock"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
        </div>
        <div class="pagination-sm">

            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
            @endif

        </div>
    </div>
@endsection
