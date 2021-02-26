@extends('adminlte::page')

@section('title', 'Permissões do Perfil')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Permissões do Perfil</a></li>
</ol>
<h1>Permissões do Perfil - {{$profile->name}}</h1>


@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('profiles.permissions.available', $profile->id)}}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i> Novo</a>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-condensed table-borderless">
            <thead>
                <tr class="table-active">
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="colgroup" class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <td class="align-middle">{{$permission->name}}</td>
                    <td class="align-middle">{{$permission->description}}</td>
                    <td class="align-middle text-center">
                        <a href="{{route('profiles.permission.detach', [$profile->id, $permission->id])}}" class="btn btn-danger btn-sm">Desvincular</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="card-footer pagination-sm">

      

    </div>
</div>
@stop