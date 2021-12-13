@extends('layouts.navbar')
@section('title', 'Editar perfil')
@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

<section class="editar">
    <div class="container-sm">
        <div class="formedit">
            <form class="form-control" action="{{route('validaredit', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                @if(isset(auth()->user()->fotoPerfil))
                <img style="width: 200px; margin-bottom: 10px; margin-top: 10px; border-style: solid; border-color: deepskyblue;" src="{{url("storage/perfil/".auth()->user()->fotoPerfil)}}"/>
                @else
                <img style="width: 200px; margin-bottom: 10px; margin-top: 10px; border-style: solid; border-color: deepskyblue;" src="{{url("storage/índice.png")}}"/>
                @endif
                <div class="mb-3">
                    <label for="fotoPerfil" class="form-label">Editar foto de perfil</label>
                    <input class="form-control" type="file" id="fotoPerfil" name="fotoPerfil">
                </div>
                <label class="form-label">Nome</label>
                <input class="form-control" type="text" name="name" value="{{auth()->user()->name}}" aria-label="default input example">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" value="{{auth()->user()->email}}" aria-label="default input example">
                <label class="form-label">Telefone</label>
                <input class="form-control" type="text" name="telefone" value="{{auth()->user()->telefone}}" aria-label="default input example">
                <label class="form-label">Senha atual</label>
                <input class="form-control" type="password" name="actualpassword" aria-label="default input example">
                <label class="form-label">Nova senha</label>
                <input class="form-control" type="password" name="password" aria-label="default input example">

                <div class="row"> 
                    <div class="col-auto" style="margin-bottom: 10px; margin-top: 10px;">
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                    <div class="col-auto" style="margin-bottom: 10px; margin-top: 10px;">
                        <a href="{{route('perfil')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>

@endsection