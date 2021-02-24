@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <h1>Detalhes do Perfil - {{$profile->name}}</h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{$profile->name}}</h3>

                    <p class="text-muted text-center">{{$profile->description}}</p>

                    <form action="{{route('profiles.destroy', $profile->id)}}" method="POST">
                        @csrf
                        <a href="{{route('profiles.index')}}" class="btn btn-sm btn-primary">Voltar</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Deletar Perfil</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection