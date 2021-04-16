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
            <a href="{{ route('tables.create') }}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i>
                Novo</a>
        </div>
        <div class="card-body table-responsive p-0">

                <table class="table table-condensed dataTable dataTable table-borderless dtr-inline">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">Identificação</th>
                            <th scope="col">Descrição</th>
                            <th scope="colgroup" class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tables as $table)
                            <tr>
                                <td class="align-middle">{{ $table->identify }}</td>
                                <td class="align-middle">{{ $table->description }}</td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('tables.show', $table->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-info btn-sm">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
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
