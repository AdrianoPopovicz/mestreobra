@extends('layouts.navbar')
@section('title', 'Editar área')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <form action="{{route('addespecifica')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="area" class="form-label">Adicionar especificação</label>
                    <input type="text" class="form-control" id="area" name="areaespecifica" placeholder="Insira uma área específica">
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$id}}">
                </div>
                <button type="submit" style="margin-bottom: 10px" class="btn btn-primary btn-sm">Adicionar</button>
            </form>
            <div class="list-group" style="text-align: center">
                @foreach($especificas as $e)
                <li class="list-group-item">{{$e->areaespecifica}} <a href="{{route('getid', $e->id)}}"><button class="btn btn-danger btn-sm">Excluir especificação</button></li></a>
                @endforeach
            </div>
            
        </div>
        <div class="col">
        </div>
    </div>
</div>

@endsection