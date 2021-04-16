@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
    </ol>
    <h1>Produtos</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.search') }}" class="form-inline float-left" method="POST">
                @csrf
                <input type="search" name="filter" class="form-control form-control-sm" placeholder="Pesquisa"
                    value="{{ $filters['name'] ?? '' }}">
                <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search mr-1"></i> Filtrar</button>
            </form>
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i>
                Novo</a>
        </div>
        <div class="card-body table-responsive p-0">

                <table class="table table-condensed dataTable dataTable table-borderless dtr-inline">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">Nome</th>
                            <th scope="col">URL</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Imagem</th>
                            <th scope="colgroup" class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="align-middle">{{ $product->name }}</td>
                                <td class="align-middle">{{ $product->url }}</td>
                                <td class="align-middle">{{ $product->price }}</td>
                                <td class="align-middle">{{ $product->description }}</td>
                                <td class="align-middle">
                                    <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}" style="max-width:50px">
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm">Editar</a>
                                    <a href="{{ route('products.categories', $product->id) }}" class="btn btn-info btn-sm" title="Categorias"><i class="fas fa-layer-group"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
        </div>
        <div class="pagination-sm">

            @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif

        </div>
    </div>
@endsection
