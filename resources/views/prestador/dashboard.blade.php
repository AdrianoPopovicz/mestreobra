@extends('layouts.navbar')
@section('title', 'Painel de pedidos')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<div class="container">
    <h1 style="color: deepskyblue">Escolha uma área para ver os serviços disponíveis:</h1>
    @foreach($areas as $area)
        <a href="{{route('lista', $area->id)}}" ><button type="button" style="width: 350px" class="btn btn-outline-info">{{$area->areaprincipal}}</button></a>
    @endforeach
</div>

@endsection