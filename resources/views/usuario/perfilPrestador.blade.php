@extends('layouts.navbar')
@section('title', 'Área do cliente')
@section('content')

<section class="perfil">
    <div class="container-sm" style="margin-bottom: 10px">
        <div class="infoperfil">
            <div class="row">
                <div class="col">
                    @if(isset($prestador->fotoPerfil))
                    <img style="width: 200px; margin-bottom: 10px; margin-top: 10px; border-style: solid; border-color: deepskyblue;" src="{{url("storage/prestadorperfil/".$prestador->fotoPerfil)}}"/>
                    @else
                    <img style="width: 200px; margin-bottom: 10px; margin-top: 10px; border-style: solid; border-color: deepskyblue;" src="{{url("storage/índice.png")}}"/>
                    @endif
                </div>
                <div class="col">
                    <h2 style="text-align: center">Orçamentos finalizados<br> {{$prestador->orcamentosFinalizados}}</h2>
                </div>
            </div>
            <ul class="list-group">
                <label class="form-label">Nome</label>
                <li class="list-group-item">{{$prestador->name}}</li>
                <label class="form-label">Avaliações</label>
                <hr>
                @foreach($avaliacoes as $avaliacao)
                <form class="form-control">
                    <label class="form-label"><strong>Nota:</strong> {{$avaliacao->nota}}</label><br>
                    @if(isset($avaliacao->comentario))
                    <label class="form-label"><strong>Comentário:</strong> <br>{{$avaliacao->comentario}}</label>
                    @endif
                </form>
                @endforeach

            </ul>
        </div>
    </div>
</section>

@endsection