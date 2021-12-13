@extends('layouts.navbar')
@section('title', 'Cadastre sua empresa')
@section('content')
        <div class="cointainer" style="margin-left: 10%; margin-right: 10%;">
            <form class="row g-3" action="{{route("cadastroempresa")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="validationServer01" class="form-label">Nome da empresa / Prestador(autônomo)</label>
                    <input type="text" class="form-control" id="nomeprestador" name="nomeempresa" required>
                </div>
                <div>
                    <label for="exampleFormControlInput1" class="form-label">Nome fantasia</label>
                    <input type="text" class="form-control" id="nomefantasia" name="nomefantasia" required>
                </div>
                <label style="color: red">Atenção! Este endereço só poderá ser mudado por um administrador autorizado da empresa, caso você seja prestador autônomo, coloque o endereço 
                    de sua residência. Para alteração, entre em contato com o suporte.</label>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua"  required>
                    </div>
                    <div class="col">
                        <label class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero"  required>
                    </div>
                    <div class="col">
                        <label class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento">
                    </div>
                    <div class="col">
                        <label class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep"  required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro"  required>
                    </div>
                    <div class="col">
                        <label class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade"  required>
                    </div>
                </div>
                <div>
                    <label class="form-label">CNPJ / CPF(autônomo)(somente números)</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00" required>
                </div>
                <div>
                    <label for="formFile" class="form-label">Insira uma imagem da sua empresa (fachada, logotipo)</label>
                    <input class="form-control" type="file" id="formFile" name="logoEmpresa" required>
                </div>
                <div class="col-12">
                <button class="btn btn-primary" style="margin-bottom: 10%;" type="submit">Próximo</button>
                </div>
            </form>
        </div>
    
@endsection