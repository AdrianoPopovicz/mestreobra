@extends('layouts.navbar')
@section('title', 'Mestreobra')
@section('content')
<div class="container">
    <h1 style="color: deepskyblue">Qual a especificação do seu serviço?</h1>
    @foreach($especificas as $e)
            <a href="{{route('finalizarPedido', [$areaprincipal, $e->id])}}"><button type="button" style="margin: 10px" class="btn btn-outline-info btn-lg">{{$e->areaespecifica}}</button></a>
    @endforeach
</div>
@endsection