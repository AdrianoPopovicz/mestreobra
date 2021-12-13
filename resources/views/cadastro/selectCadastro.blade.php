@extends('layouts.navbar')
@section('title', 'Cadastre-se')
@section('content')

<div class="container">
    <h1>Você deseja se cadastrar como:</h1>
    <div class="row" style="margin-top: 50px">
        <div class="col">
            <a href="{{route('cadastro')}}" id="prestador"><img style="width: 200px; margin-bottom: 10px; margin-top: 10px; margin-left: 200px" src="{{url("storage/prestador.png")}}"/></a>
        </div>
        <div class="col-auto">
            <a href="{{route('cadastroCliente')}}" id="user"><img style="width: 200px; margin-bottom: 10px; margin-top: 10px; margin-right: 200px" src="{{url("storage/user.png")}}"/></a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="prestador" style="margin-left: 200px"><h2>Prestador</h2></label>
        </div>
        <div class="col-auto">
            <label style="margin-right: 250px" for="user"><h2>Cliente</h2></label>
        </div>
    </div>
</div>

@endsection