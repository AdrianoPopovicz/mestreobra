@extends('layouts.navbar')
@section('title', 'Avaliar prestador')
@section('content')

<div class="container">
    <h2 style="text-align: center">Você aceitou a oferta de {{$prestador->name}}!</h2>
    <p style="text-align: center">Agora você tem acesso as informações de contato dele e pode agilizar seu serviço!
        Lembre-se, o prestador recebeu um email avisando sobre a proposta aceita e também recebeu seu contato.</p>
    <hr>
    <h4>Nome do prestador: {{$prestador->name}}</h4>
    <h4>Telefone: {{$prestador->telefone}}</h4>
    <h4>Email: {{$prestador->email}}</h4>
    <h2 style="text-align: center; color: deepskyblue">Boa obra!</h2>
    <a href="{{route('cliente')}}"><button type="button" class="btn btn-secondary">Voltar ao perfil</button></a>
</div>

@endsection