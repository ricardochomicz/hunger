@extends('adminlte::page')

@section('title', 'Categorias do Produto')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Perfis</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.categories', $product->id) }}">Planos</a></li>
    </ol>
    <h1>Categorias do Produto - {{ $product->name }}</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('products.categories.available', $product->id) }}" class="btn btn-sm btn-dark float-right"><i
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
                    @foreach ($categories as $category)
                        <tr>
                            <td class="align-middle">{{ $category->name }}</td>
                            <td class="align-middle">{{ $category->description }}</td>
                            <td class="align-middle text-center">
                                <a href="{{ route('products.categories.detach', [$product->id, $category->id]) }}"
                                    class="btn btn-danger btn-sm">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
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
