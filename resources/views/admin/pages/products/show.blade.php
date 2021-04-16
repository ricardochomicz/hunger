@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <h1>Detalhes do Produto {{$product->name}}</h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-categoryname text-center">{{$product->name}}</h3>

                    <p class="text-muted text-center">{{$product->url}}</p>
                    <p class="text-center">
                        <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}" style="max-width:50px;">
                    </p>
                    

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Empresa:</b> {{ $product->company->name }}
                        </li>
                       
                    </ul>
                    <form action="{{route('products.destroy', $product->id)}}" method="POST">
                        @csrf
                        <a href="{{route('products.index')}}" class="btn btn-sm btn-primary">Voltar</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop