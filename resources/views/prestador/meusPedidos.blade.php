@extends('layouts.navbar')
@section('title', 'Meus pedidos')
@section('content')
<div class="container">
    @foreach($pedidos as $pedido)
    <table class="table table-success">
        <tr>
            <td><h3>Pedido #{{$pedido->id}}</h3></td>
            <td colspan="2">Valor que o cliente ofereceu: {{$pedido->valorCliente}}</td>
            @if($pedido->ativo == 1)
            <td style="color: rgb(27, 189, 27)">Pedido ativo</td>
            @elseif($pedido->ativo == 2 or $pedido->ativo == 3)
            <td style="color: rgb(155, 155, 28)">Pedido fechado</td>
            @endif
            @if($pedido->ativo == 4)
            <td style="color: red">Pedido concluído</td>
            @endif
        </tr>
        <tr>
            <td colspan="2">Data da solicitação: {{$pedido->created_at}}</td>
            <td>Mínimo de orçamentos: {{$pedido->orcamentos}}</td>
            <td>Urgência: {{$pedido->urgencia}}</td>
        </tr>
        <tr><td colspan="4"><p>Descrição: {{$pedido->descricao}}</p></td></tr>
    </table>
    <a href="{{route('detalhes', $pedido->id)}}"><button style="margin-bottom: 50px" type="button" class="btn btn-primary">Ver detalhes</button></a>
    @endforeach
</div>
@endsection