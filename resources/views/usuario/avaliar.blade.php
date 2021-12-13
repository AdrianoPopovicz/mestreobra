@extends('layouts.navbar')
@section('title', 'Avaliar prestador')
@section('content')

<div class="container">
    <h1> Obrigado por usar o MestreObra! </h1>
    <p> Nosso objetivo é sempre trazer os melhores prestadores da região até você! Por isso, deixe sua avaliação de como
        foi sua experiência com o(a) {{$prestador->name}}. Seu nome não aparecerá na avaliação.</p>
        <form class="form-control" style="margin-bottom: 20px" method="POST" action="{{route('save')}}">
            @csrf
            <label for="nota" class="form-label">Sendo "0" para péssimo, e "5" para excelente, qual sua nota geral para o(a) {{$prestador->name}}</label>
            <select class="form-select" id="nota" name="nota" aria-label="Default select example">
                <option selected>Escolha a nota</option>
                <option value="1">0</option>
                <option value="2">1</option>
                <option value="3">2</option>
                <option value="4">3</option>
                <option value="5">4</option>
                <option value="6">5</option>
            </select>
            <label for="comentario" class="form-label">Gostaria de deixar um comentário sobre {{$prestador->name}} para ajudar outros clientes?</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="4"></textarea>
            <input type="hidden" name="prestadorId" id="prestador" value="{{$prestador->id}}">
            <input type="hidden" name="orcamentoId" id="orcamento" value="{{$orcamento->id}}">
            <button type="submit" style="margin-top: 10px; margin-bottom: 10px;" class="btn btn-primary">Enviar avaliação</button>
        </form>
</div>

@endsection