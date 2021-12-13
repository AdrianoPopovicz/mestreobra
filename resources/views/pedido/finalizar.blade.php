@extends('layouts.navbar')
@section('title', 'Mestreobra')
@section('content')

<div class="container">
    <h1 style="color: deepskyblue">Finalize seu pedido</h1>
    <h3>Você escollheu a área principal "{{$areaprincipalPedido->areaprincipal}}" e a área específica "{{$areaespecificaPedido->areaespecifica}}".</h3>
    <form class="row g-3" action="{{route('criarPedido', [$areaprincipalPedido, $areaespecificaPedido])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-floating">
        <textarea class="form-control" name="descricao" placeholder="Descreva brevemente seu pedido" id="descricao" style="height: 100px"></textarea>
        <label for="descricao">Descreva brevemente seu pedido</label>
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label style="color: red">*Mínimo de orçamentos</label>
                <select class="form-select" aria-label="orcamentos" name="orcamentos">
                    <option selected>Quantos orçamentos você deseja ter?</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <div class="col">
            <br>
            <select class="form-select" aria-label="urgencia" name="urgencia">
                <option selected>Qual a urgência do serviço?</option>
                <option value="1">Esta semana</option>
                <option value="2">Próximas semanas</option>
                <option value="3">Pŕoximo mês</option>
                <option value="4">Próximos 6 meses</option>
            </select>
        </div>
        <div class="col">
            <label for="valorCliente">Qual o valor que você quer pagar?</label>
            <input type="text" name="valorCliente" class="form-control" id="valorCliente" placeholder="Posso pagar até 300">
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="fotosPedidos" class="form-label">Quer adicior algumas fotos do seu serviço?</label>
                    <input class="form-control" type="file" id="fotosPedidos" name="fotosPedidos[]" multiple>
                </div>
            </div>
            <div class="col">
                <label class="form-label">O que é mais importante para você?</label>
                <select class="form-select" aria-label="urgencia" name="ordem">
                    <option selected>--selecione--</option>
                    <option value="1">Qualidade</option>
                    <option value="2">Preço</option>
                    <option value="3">Tempo</option>
                </select>
            </div>
            <div class="">
                <label class="form-label">Quantos dias você quer que seu pedido permaneça disponível para os prestadores? (Depois deste tempo, seu pedido receberá o status de "fechado")</label>
                <select class="form-select" aria-label="date" name="diasEmAberto">
                    <option selected>--selecione--</option>
                    <option value="+7 days">7 dias</option>
                    <option value="+15 days">15 dias</option>
                    <option value="+30 days">30 dias</option>
                    <option value="+90 days">3 meses</option>
                </select>
            </div>
        </div>
        <h3>Agora precisamos das suas informações. Não se preocupe, nenhum dado é compartilhado sem o seu consentimento.</h3>
        <div class="form">
                <div>
                    <label for="emailusuario" class="form-label">Endereço de Email</label>
                    <input type="email" class="form-control" id="emailusuario" name="emailusuario" placeholder="seuemail@exemplo.com" required>
                </div>
                <p>Caso você já possua cadastro em nossa plataforma, não é necessário preencher as informações abaixo.</p>
                <h2 style="color: deepskyblue">Novo usuário</h2>
                <div>
                    <label for="nomeusuario" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nomeusuario" name="nomeusuario">
                </div>
                <div>
                    <label class="form-label">Telefone para contato</label>
                    <input type="text" class="form-control" id="numero" name="telefoneusuario" placeholder="(99)99999-9999">
                </div>
                <div class="mb-3">
                    <label for="userpassword" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="userpassword" id="userpassword">
                </div>
                <button type="submit" class="btn btn-primary">Fazer pedido</button>
        </div>
    </div>
    </form>
</div>


@endsection