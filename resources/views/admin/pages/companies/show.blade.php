@extends('adminlte::page')

@section('title', 'Detalhes da Empresa')

@section('content_header')
    <h1>Detalhes da Empresa {{$company->name}}</h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-categoryname text-center">{{$company->name}}</h3>

                    <p class="text-center">
                        <img src="{{ url("storage/{$company->logo}") }}" alt="{{ $company->name }}" style="max-width:50px;">
                    </p>
                    

                    <ul class="list-group list-group-unbordered mb-3 p-1">
                        <li class="list-group-item border-0">
                            <b>Empresa:</b> {{ $company->name }}
                        </li>
                        <li class="list-group-item border-0">
                            <b>CNPJ:</b> {{ $company->cnpj }}
                        </li>
                        <li class="list-group-item border-0">
                            <b>E-mail:</b> {{ $company->email }}
                        </li>
                        <li class="list-group-item border-0">
                            <b>Ativo:</b> {{ $company->active == 'Y' ? 'SIM' : 'NÃO' }}
                        </li>                     
                    </ul>
                    <hr>
                    <h3>Assinatura</h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item border-0">
                            <b>Plano:</b> {{ $company->plan->name }}
                        </li>
                        <li class="list-group-item border-0">
                            <b>Data Assinatura:</b> {{ Carbon\Carbon::parse($company->subscription)->format('d/m/Y') }}
                        </li>
                        <li class="list-group-item border-0">
                            <b>Data Expiração:</b> {{ Carbon\Carbon::parse($company->expires_at)->format('d/m/Y') }}
                        </li>
                        <li class="list-group-item border-0">
                            <b>Identificador:</b> {{ $company->subscription_id }}
                        </li>
                        <li class="list-group-item border-0">
                            <b>Ativo:</b> {{ $company->subscription_active == 'Y' ? 'SIM' : 'NÃO' }}
                        </li>
                    </ul>
                    <form action="{{route('companies.destroy', $company->id)}}" method="POST">
                        @csrf
                        <a href="{{route('companies.index')}}" class="btn btn-sm btn-primary">Voltar</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop