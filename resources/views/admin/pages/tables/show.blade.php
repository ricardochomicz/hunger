@extends('adminlte::page')

@section('title', 'Detalhes da Mesa')

@section('content_header')
    <h1>Detalhes da Mesa {{$table->name}}</h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-name text-center">{{$table->identify}}</h3>

                    <p class="text-muted text-center">{{$table->description}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Empresa:</b> {{ $table->company->name }}
                        </li>
                       
                    </ul>
                    <form action="{{route('tables.destroy', $table->id)}}" method="POST">
                        @csrf
                        <a href="{{route('tables.index')}}" class="btn btn-sm btn-primary">Voltar</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop