@extends('layouts.navbar')
@section('title', 'Perfil')
@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
<section class="perfil">
        <div class="container-sm" style="margin-bottom: 10px">
            <div class="infoperfil">
                <div class="row">
                    <div class="col">
                        @if(isset(auth()->user()->fotoPerfil))
                        <img style="width: 200px; margin-bottom: 10px; margin-top: 10px; border-style: solid; border-color: deepskyblue;" src="{{url("storage/prestadorperfil/".auth()->user()->fotoPerfil)}}"/>
                        @else
                        <img style="width: 200px; margin-bottom: 10px; margin-top: 10px; border-style: solid; border-color: deepskyblue;" src="{{url("storage/índice.png")}}"/>
                        @endif
                    </div>
                    <div class="col">
                        <ul class="list-group" style="margin-top: 5px">
                            <li class="list-group-item"><h3>Áreas de atuação</h3></li>
                            @foreach($areasAtuacao as $areaAtuacao)
                            <li class="list-group-item">{{$areaAtuacao->areas}}</li>
                            @endforeach
                        </ul>
                        <form method="POST" action="{{route('addAreaPrestador')}}">
                            @csrf
                            <select class="form-select" aria-label="Default select example" name="newarea">
                                <option selected>Selecione a área que deseja adicionar</option>
                                @foreach($areasPrincipais as $area)
                                <option value="{{$area->areaprincipal}}">{{$area->areaprincipal}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success">Adicionar área</button>
                        </form>
                    </div>
                    <div class="col">
                        <h2 style="text-align: center">Orçamentos enviados <br> {{$user->orcamentos}} <br>
                        Orçamentos finalizados<br> {{$user->orcamentosFinalizados}}</h2>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                    <a href="{{route('painel')}}"><button type="button" class="btn btn-info">Painel de pedidos</button></a>
                </div>
                <div class="col-auto">
                    <a href="{{route('meusPedidos')}}"><button type="button" class="btn btn-dark">Meus pedidos</button></a>
                </div>
                </div>
                <ul class="list-group">
                    <label class="form-label">Nome</label>
                    <li class="list-group-item">{{$user->name}}</li>
                    <label class="form-label">Email</label>
                    <li class="list-group-item">{{$user->email}}</li>
                    <label class="form-label">Telefone</label>
                    <li class="list-group-item">{{$user->telefone}}</li>
                    @if(@isset($empresa->complemento))
                    <label class="form-label">Endereço</label>
                    <li class="list-group-item">Rua {{$empresa->rua}}, nº {{$empresa->numero}} - {{$empresa->complemento}}</li>
                    @else
                    <label class="form-label">Endereço</label>
                    <li class="list-group-item">Rua {{$empresa->rua}}, nº {{$empresa->numero}}</li>
                    @endif
                    <label class="form-label">Cidade e bairro</label>
                    <li class="list-group-item">{{$empresa->bairro}} - {{$empresa->cidade}}</li>
                </ul>
                <a href="{{route('editarperfil', auth()->user()->id)}}"> <button type="button" style="margin-top: 10px" class="btn btn-outline-dark">Editar perfil</button></a>
            </div>
        </div>
</section>

@endsection