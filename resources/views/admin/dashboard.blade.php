@extends('layouts.navbar')
@section('title', 'Painel administrativo')
@section('content')
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Empresas</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Prestadores</button>
        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Áreas de atuação</button>
    </div>
</nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <form action="{{route('addarea')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="area" class="form-label">Adicionar área</label>
                                <input type="text" class="form-control" id="area" name="areaprincipal" placeholder="Insira uma área de atuação principal">
                            </div>
                            <button type="submit" style="margin-bottom: 10px" class="btn btn-primary btn-sm">Adicionar</button>
                        </form>
                        <div class="list-group" style="text-align: center">
                            @foreach($areas as $a)
                            <li class="list-group-item">{{$a->areaprincipal}} <a href="{{route('editarArea', $a->id)}}"><button class="btn btn-info btn-sm">Editar áreas específicas</button></a> <a href="{{route('getid', $a->id)}}"><button class="btn btn-danger btn-sm">Excluir área</button></li></a>
                            @endforeach
                        </div>
                        
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
    </div>
  


@endsection