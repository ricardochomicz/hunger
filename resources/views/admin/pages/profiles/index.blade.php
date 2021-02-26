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
                <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
            <a href="{{ route('profiles.create') }}" class="btn btn-sm btn-dark float-right"><i
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td class="align-middle">{{ $profile->name }}</td>
                            <td class="align-middle">{{ $profile->description }}</td>
                            <td class="align-middle text-center">
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info btn-sm">Editar</a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}"
                                    class="btn btn-default btn-sm"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

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
