@extends('adminlte::page')

@section('title', 'Detalhes do Cargo')

@section('content_header')
    <h1>Detalhes do Cargo - {{$role->name}}</h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{$role->name}}</h3>

                    <p class="text-muted text-center">{{$role->description}}</p>

                    <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                        @csrf
                        <a href="{{route('roles.index')}}" class="btn btn-sm btn-primary">Voltar</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Deletar Perfil</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection