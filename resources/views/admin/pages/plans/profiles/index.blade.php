@extends('adminlte::page')

@section('title', 'Perfis do Plano')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Perfis</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.profiles', $plan->id)}}">Planos</a></li>
</ol>
<h1>Perfis do Plano - {{$plan->name}}</h1>


@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('plans.profiles.available', $plan->id)}}" class="btn btn-sm btn-dark float-right"><i class="fas fa-plus mr-1"></i> Novo</a>
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
                @foreach($profiles as $profile)
                <tr>
                    <td class="align-middle">{{$profile->name}}</td>
                    <td class="align-middle">{{$profile->description}}</td>
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