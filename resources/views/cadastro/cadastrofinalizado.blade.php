@extends('layouts.navbar')
@section('title', 'Finalizado!')
@section('content')
<div class="corpo" style="height: 100vh">
        <div class="texto">
            <div class="final" style="margin: 10%; color: deepskyblue; text-align: center;">
                <h2>Tudo pronto! Agora você está cadatrado em nossa plataforma e terá acesso as melhores oportunidades de negócio da região!</h2>
            </div>
        </div>
        <div class="botao" style="text-align: center; margin-bottom: 10px;">
            <a href="{{route('perfil')}}"><button type="button" class="btn btn-info">Ir para o Perfil</button></a>
        </div>
</div>  
@endsection