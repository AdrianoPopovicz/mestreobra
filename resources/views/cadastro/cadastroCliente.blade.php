@extends('layouts.navbar')
@section('title', 'Cadastre-se')
@section('content')
<div class="container">
    <form class="row g-3" action="{{route("cadastroUser")}}" method="POST">
        @csrf
        <div>
            <label for="validationServer01" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nomeprestador" name="nomeuser" required>
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Endereço de Email</label>
            <input type="email" class="form-control" id="emailprestador" name="emailuser" placeholder="seuemail@exemplo.com" required>
        </div>
        <div>
            <label class="form-label">Telefone para contato</label>
            <input type="text" class="form-control" id="numero" name="telefoneuser" placeholder="(99)99999-9999" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirme sua senha</label>
            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1">
        </div>
        <div>
            <!--<select class="form-select" aria-label="Default select example" name="pesquisa" required>
                <option selected>Como conheceu o MestreObra?</option>
                <option value="1">Facebook</option>
                <option value="2">Instagram</option>
                <option value="3">Google</option>
                <option value="4">Indicação</option>
                <option value="5">Jornal</option>
                <option value="6">Blog</option>
                <option value="7">Outro</option>
            </select>-->
            <div class="form-check" style="margin-top: 10px;">
                <input class="form-check-input" type="checkbox" value="" id="check" required>
                <label class="form-check-label" for="invalidCheck3">
                    Li e aceito os termos e condições de uso.
                </label>
        </div>
        </div>
        <div class="col-12">
        <button class="btn btn-primary" style="margin-bottom: 5%" type="submit">Próximo</button>
        </div>
    </form>
</div>
@endsection