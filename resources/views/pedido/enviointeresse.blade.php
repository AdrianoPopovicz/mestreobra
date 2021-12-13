@extends('layouts.navbar')
@section('title', 'Painel de pedidos')
@section('content')

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
            @if($orcamentos != 0))
            <td>Orçamentos oferecidos: {{count($orcamentos)}}</td> 
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
    <div class="fotos">
        @foreach($fotos as $foto)
            <img style="width: 500px; margin: 20px; border-style: solid; border-color: black;" src="{{url("storage/pedidos/".$foto->fotoName)}}"/>
        @endforeach
    </div>
    <form class="form-control" method="POST" action="{{route('orcamento', $pedido->id)}}" style="margin-bottom: 20px">
        @csrf
        <div class="mb-3">
            <label for="valor" class="form-label">Valor estimado do serviço(somente a sua mão de obra)</label>
            <input type="number" class="form-control" id="valor" name="valor" placeholder="Digite o valor sem virgulas. Ex.: 250" required>
        </div>
        <div class="mb-3">
            <label for="tempo" class="form-label">Tempo estimado para realizar o serviço</label>
            <input type="number" class="form-control" id="tempo" name="tempo" placeholder="Digite o número de dias" required>
        </div>
        <div class="mb-3">
            <label for="dataInicio" class="form-label">Dia que você pode iniciar a obra</label>
            <input type="date" class="form-control" id="dataInicio" name="dataInicio" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar orçamento</button>
    </form>
</div>

@endsection