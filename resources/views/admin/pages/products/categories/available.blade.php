@extends('adminlte::page')

@section('title', 'Categorias disponiveis do produto {$product->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li class="breadcrumb-item active"><a
                href="{{ route('products.categories.available', $product->id) }}">Disponíveis</a></li>
    </ol>
    <h1>Categorias disponiveis do produto - {{ $product->name }}</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.categories.available', $product->id) }}" class="form-inline float-left"
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
                    <form action="{{ route('products.categories.attach', $product->id) }}" method="POST">
                        @csrf

                        @foreach ($categories as $category)
                            <tr>
                                <td class="align-middle">
                                    <input type="checkbox" name="categories[]" id="customCheckbox1"
                                        value="{{ $category->id }}">
                                </td>
                                <td class="align-middle">{{ $category->name }}</td>
                                <td class="align-middle">{{ $category->description }}</td>
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
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif

        </div>
    </div>
@stop
