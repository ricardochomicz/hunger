@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>Detalhes do Plano {{$plan->name}}</h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{$plan->name}}</h3>

                    <p class="text-muted text-center">{{$plan->description}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Valor:</b> <a class="float-right">R$ {{ number_format($plan->price, 2,',','.') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>URL:</b> <a class="float-right">{{$plan->url}}</a>
                        </li>
                    </ul>
                    <form action="{{route('plans.destroy', $plan->id)}}" method="POST">
                        @csrf
                        <a href="{{route('plans.index')}}" class="btn btn-sm btn-primary"><b>Voltar</b></a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop