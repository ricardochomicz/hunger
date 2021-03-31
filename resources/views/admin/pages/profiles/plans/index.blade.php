@extends('adminlte::page')

@section('title', 'Planos do Perfil')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfis</a></li>
    <li class="breadcrumb-item active"><a href="{{route('profiles.plans', $profile->id)}}">Planos</a></li>
</ol>
<h1>Planos do Perfil - {{$profile->name}}</h1>


@stop

@section('content')
<div class="card">
    <div class="card-header">
        
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
                @foreach($plans as $plan)
                <tr>
                    <td class="align-middle">{{$plan->name}}</td>
                    <td class="align-middle">{{$plan->description}}</td>
                    <td class="align-middle text-center">
                        <a href="{{route('plans.profile.detach', [$plan->id, $profile->id])}}" class="btn btn-danger btn-sm">Desvincular</a>
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