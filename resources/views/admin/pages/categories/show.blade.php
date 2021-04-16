@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')
    <h1>Detalhes da Categoria {{$category->name}}</h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-categoryname text-center">{{$category->name}}</h3>

                    <p class="text-muted text-center">{{$category->url}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Empresa:</b> {{ $category->company->name }}
                        </li>
                       
                    </ul>
                    <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                        @csrf
                        <a href="{{route('categories.index')}}" class="btn btn-sm btn-primary">Voltar</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop