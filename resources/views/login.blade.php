@extends('layouts.navbar')
@section('title', 'Entrar')
@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
<div class="corpo" style="height: 100vh">
<div class="container">
    <form method="POST" action="{{route("loginvalidacao")}}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="senha">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="lembrar">
            <label class="form-check-label" for="lembrar">Lembrar senha</label>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
</div>
  @endsection
