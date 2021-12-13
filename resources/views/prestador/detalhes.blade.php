@extends('layouts.navbar')
@section('title', 'Detalhes do pedido')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<div class="container">
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
            <td colspan="1">Área principal do pedido: {{$areaPrincipal->areaprincipal}}</td>
            <td colspan="2">Área específica do pedido: {{$areaEspecifica->areaespecifica}}</td>
            @if($numeroOrcamentos != 0)
            <td>Orçamentos oferecidos: {{count($numeroOrcamentos)}}</td> 
            @else
            <td>Orçamentos oferecidos: 0 </td>
            @endif
        <tr>
            <td colspan="2">Data da solicitação: {{$pedido->created_at}}</td>
            <td>Mínimo de orçamentos: {{$pedido->orcamentos}}</td>
            <td>Urgência: {{$pedido->urgencia}}</td>
        </tr>
        <tr><td colspan="4"><p>Descrição: {{$pedido->descricao}}</p></td></tr>
    </table>
    <hr>
    <table class="table table-success">
        <tr>
            <td colspan="3"><h3>Minha oferta</h3></td>
        </tr>
        <tr>
            <td>Valor da obra: {{$orcamento->valor}}</td>
            <td>Duração da obra: {{$orcamento->tempo}} dias</td>
            <td>Dia do início: {{$orcamento->diaInicio}}</td>
    </table>
    @if($orcamento->aceito == 1 && $pedido->encerrarPrestador == 0)
    <a href="{{route('encerrarPedidoPrestador', $pedido->id)}}"><button type="button" style="margin-bottom: 50px" class="btn btn-dark">Encerrar pedido</button></a>
    @endif
    @if($orcamento->aceito == 1 && $pedido->encerrarPrestador == 1 && $pedido->ativo > 4)
    <div class="alert alert-info">
        <p>Aguardando confirmação do cliente</p>
    </div>
    @endif
</div>

@endsection