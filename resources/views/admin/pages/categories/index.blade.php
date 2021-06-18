@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Usuários</a></li>
    </ol>
    <h1>Usuários</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" class="form-inline float-left" method="POST">
                @csrf
                <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa"
                    value="{{ $filters['name'] ?? '' }}">
                <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
            
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i>
                Novo</a>
        </div>
        <div class="card-body table-responsive">

                <table class="table table-condensed dataTable dataTable table-borderless dtr-inline">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">Nome</th>
                            <th scope="col">URL</th>
                            <th scope="col">Descrição</th>
                            <th scope="colgroup" class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="align-middle">{{ $category->name }}</td>
                                <td class="align-middle">{{ $category->url }}</td>
                                <td class="align-middle">{{ $category->description }}</td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Ver" data-container=".content"><i
                                        class="fas fa-eye"></i></a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar" data-container=".content"><i
                                        class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
        </div>
        <div class="pagination-sm">

            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif

        </div>
    </div>
@endsection
