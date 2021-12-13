@extends('layouts.navbar')
@section('title', 'Pedidos')
@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

<div class="container">
    <h1>Pedidos para {{$area->areaprincipal}}</h1>
    <hr>
    @foreach($pedidos as $pedido)
        @if($pedido->pedido == $area->id && $pedido->ativo == 1)
            <table class="table table-success">
                <tr>
                    <td colspan="2"><h3>Pedido #{{$pedido->id}}</h3></td>
                    <td>Valor que o cliente ofereceu: {{$pedido->valorCliente}}</td>
                </tr>
                <tr>
                    <td>Data da solicitação: {{$pedido->created_at}}</td>
                    <td>Máximo de orçamentos: {{$pedido->orcamentos}}</td>
                    <td>Urgência: {{$pedido->urgencia}}</td>
                </tr>
                <tr><td colspan="3"><p>Descrição: {{$pedido->descricao}}</p></td></tr>
            </table>
            <a href="{{route('pedidoInteressado', $pedido->id)}}"><button type="button" style="margin-bottom: 50px" class="btn btn-dark">Vizualizar pedido</button></a>
        @endif
    @endforeach
</div>
@endsection