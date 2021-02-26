@extends('adminlte::page')

@section('title', 'Perfis da Permissão')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Permissões do Perfil</a></li>
</ol>
<h1>Perfis da Permissão - {{$permission->name}}</h1>


@stop

@section('content')
<div class="card">
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
                @foreach($profiles as $profile)
                <tr>
                    <td class="align-middle">{{$profile->name}}</td>
                    <td class="align-middle">{{$profile->description}}</td>
                    <td class="align-middle text-center">
                        <a href="{{route('profiles.permission.detach', [$profile->id, $permission->id])}}" class="btn btn-danger btn-sm">Desvincular</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="card-footer pagination-sm">
        @if (isset($filters))
            {!! $profiles->appends($filters)->links() !!}
            @else 
            {!! $profiles->links() !!}
        @endif
    </div>
</div>
@stop