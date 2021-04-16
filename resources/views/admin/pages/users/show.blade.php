@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
    <h1>Detalhes do Usuário {{$user->name}}</h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{$user->name}}</h3>

                    <p class="text-muted text-center">{{$user->email}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Empresa:</b> {{ $user->company->name }}
                        </li>
                       
                    </ul>
                    <form action="{{route('users.destroy', $user->id)}}" method="POST">
                        @csrf
                        <a href="{{route('users.index')}}" class="btn btn-sm btn-primary">Voltar</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop