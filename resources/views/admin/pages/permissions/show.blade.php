@extends('adminlte::page')

@section('title', 'Detalhes da Permissão')

@section('content_header')
    <h1>Detalhes da Permissão - {{$permission->name}}</h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{$permission->name}}</h3>

                    <p class="text-muted text-center">{{$permission->description}}</p>

                    <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                        @csrf
                        <a href="{{route('permissions.index')}}" class="btn btn-sm btn-primary">Voltar</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Deletar Perfil</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection