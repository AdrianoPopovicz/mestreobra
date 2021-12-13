@extends('layouts.navbar')
@section('title', 'Área do cliente')
@section('content')

<div class="container">
    <table class="table table-success">
        <tr>
            <td colspan="3"><h3>Pedido #{{$pedido->id}}</h3></td>
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
            <td>Data da solicitação: {{$pedido->created_at}}</td>
            <td>Mínimo de orçamentos: {{$pedido->orcamentos}}</td>
            <td>Urgência: {{$pedido->urgencia}}</td>
            <td>Valor que ofereci: {{$pedido->valorCliente}}</td>
        </tr>
        <tr>
            <td>Área principal do pedido: {{$principal->areaprincipal}}</td>
            <td colspan="3">Área específica do pedido: {{$especifica->areaespecifica}}</td>
        <tr><td colspan="4"><p>Descrição: {{$pedido->descricao}}</p></td></tr>
    </table>
    <div class="fotos">
        @foreach($fotos as $foto)
            <img style="width: 500px; margin: 20px; border-style: solid; border-color: black;" src="{{url("storage/pedidos/".$foto->fotoName)}}"/>
        @endforeach
    </div>
    <div class="botoes">
        @if($pedido->encerrarCliente == 0)
        <a href="{{route('encerrarPedidoCliente', $pedido->id)}}"><button type="button" style="margin-bottom: 50px" class="btn btn-dark">Encerrar pedido</button></a>
        @endif
        @if($numeroOrcamentos == 0)
        <a href="{{route('deletarPedido', $pedido->id)}}"><button type="button" style="margin-bottom: 50px" class="btn btn-danger">Excluir pedido</button></a>
        @endif
    </div>
    <h1>Orçamentos recebidos</h1>
    @foreach($orcamentos as $orcamento)
    <table class="table table-primary">
        <tr>
            <td colspan="3"><h3>Prestador: {{$orcamento->prestador}}</h3></td>
        </tr>
        <tr>
            <td>Preço oferecido: {{$orcamento->valor}}</td>
            <td>Tempo estimado para realização do serviço: {{$orcamento->tempo}}</td>
            <td>Dia de em que o prestador pode começar: {{$orcamento->diaInicio}}</td>
    </table>
    @if($orcamento->aceito == 0 && $pedido->ativo < 4)
    <a href="{{route('fecharNegocio', $orcamento->id)}}"><button type="button" style="margin-bottom: 50px" class="btn btn-success">Aceitar proposta</button></a>
    @endif
    @if($orcamento->aceito == 1 && $pedido->ativo < 4)
    <a href="{{route('dadosPrestador', $orcamento->id)}}"><button type="button" style="margin-bottom: 50px" class="btn btn-info">Detalhes de contato</button></a>
    @endif
    @if($pedido->ativo == 4 && $orcamento->avaliado == 0 && $orcamento->aceito == 1)
    <a href="{{route('avaliar', $orcamento->id)}}"><button type="button" style="margin-bottom: 50px" class="btn btn-info">Avaliar {{$orcamento->prestador}}</button></a>
    @endif
    <a href="{{route('perfilPrestador', $orcamento->prestador)}}"><button type="button" style="margin-bottom: 50px" class="btn btn-primary">Ver perfil do(a) {{$orcamento->prestador}}</button></a>
    @endforeach
</div>
@endsection