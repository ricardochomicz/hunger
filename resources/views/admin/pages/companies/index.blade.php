@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresa</a></li>
    </ol>
    <h1>Empresa</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-header">
            
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i>
                Novo</a>
        </div>
        <div class="card-body table-responsive p-0">

                <table class="table table-condensed dataTable dataTable table-borderless dtr-inline">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">Nome</th>
                            <th scope="col">URL</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Ativo</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Data Cadastro</th>
                            <th scope="colgroup" class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td class="align-middle">{{ $company->name }}</td>
                                <td class="align-middle">{{ $company->url }}</td>
                                <td class="align-middle">{{ $company->email }}</td>
                                <td class="align-middle">{{ $company->active == 'Y' ? 'SIM' : 'NÃO' }}</td>
                                <td class="align-middle">
                                    <img src="{{ url("storage/{$company->logo}") }}" alt="{{ $company->name }}" style="max-width:50px">
                                </td>
                                <td class="align-middle">{{ Carbon\Carbon::parse($company->subscription)->format('d/m/Y') }}</td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info btn-sm">Editar</a>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
        </div>
        <div class="pagination-sm">

            @if (isset($filters))
                {!! $companies->appends($filters)->links() !!}
            @else
                {!! $companies->links() !!}
            @endif

        </div>
    </div>
@endsection
