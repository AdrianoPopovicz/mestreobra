@extends('layouts.navbar')
@section('title', 'Área do cliente')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<section class="area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Bem-vindo, {{$user->name}}!</h1>
            </div>
            <div class="col-auto">
                <a href="" id="perfil"><img style="width: 100px; margin-bottom: 10px; margin-top: 10px;" src="{{url("storage/user.png")}}"/></a>
            </div>
        </div>
        <div class="pedidos">
            <div class="row">
                <div class="col">
                    <h2>Meus pedidos</h2>
                </div>
                <div class="col-auto">
                    <a href="{{route('index')}}"><button type="button" class="btn btn-success">Novo pedido</button></a>
                </div>
            </div>
            @foreach($pedidos as $pedido)
            <table class="table table-success">
                <tr>
                    <td colspan="2"><h3>Pedido #{{$pedido->id}}</h3></td>
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
                </tr>
                <tr><td colspan="3"><p>Descrição: {{$pedido->descricao}}</p></td></tr>
            </table>
            <a href="{{route('pedidoCliente', $pedido->id)}}"><button type="button" style="margin-bottom: 50px" class="btn btn-dark">Ver meu pedido</button></a>
            @endforeach
        </div>
    </div>
</section>

@endsection