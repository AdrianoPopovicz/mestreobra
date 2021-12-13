@extends('layouts.navbar')
@section('title', 'Selecione sua empresa')
@section('content')

<div class="container">
    <h2>Selecione sua empresa</h2>
    <a href="{{route('cadastroempresa')}}"><button type="button" class="btn btn-success">Adicionar empresa</button></a>
    <ul>
        @foreach($empresas as $empresa)
        <li><a href="{{route('salvarEmpresaPrestador', $empresa->id)}}"><img style="width: 200px; height: 200px; margin-bottom: 10px; margin-top: 10px;" src="{{url("storage/empresas/".$empresa->logoEmpresa)}}"/></a>
        <br><h2>{{$empresa->nomeempresa}}</h2></li>
        @endforeach
    </ul>
@endsection