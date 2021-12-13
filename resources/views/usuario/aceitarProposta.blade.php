@extends('layouts.navbar')
@section('title', 'Área do cliente')
@section('content')

<div class="container" style="text-align: center">
    <h1 style="color: red; text-align: center;">ATENÇÃO!!!</h1>
    <h2 style="text-align: center">Uma vez que você aceite a proposta de um prestador, terá acesso ao contato dele para que possam 
        negociar e seu pedido não estará mais disponível para receber orçamentos.</h2>
        <p style="color: deepskyblue; text-align: center; margin-top: 20vh;">Nós NÃO nos responsabilizamos por qualquer atitude do prestador, apenas apresentamos suas
        propostas.</p>
        <a href="{{route('fechado', $orcamento->id)}}"><button type="button" class="btn btn-success btn-lg">Aceitar proposta</button></a>
        <a href="{{route('cliente')}}"><button type="button" class="btn btn-secondary btn-lg">Voltar</button></a>
</div>

@endsection
