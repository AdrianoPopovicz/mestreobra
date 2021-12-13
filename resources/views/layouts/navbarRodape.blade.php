<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>-->

    <title>@yield('title')</title>
</head>
<body style="height: 100%">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: deepskyblue;">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Mestreobra</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Parceiros</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Informações
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Dúvidas</a></li>
                  <li><a class="dropdown-item" href="#">Planos</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Sobre</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex">
              @if(auth()->check())
                @if(auth()->user()->nivel == 0)
                <a href="{{route('cliente')}}"><button type="button" style="margin-right: 10px" class="btn btn-outline-dark">{{auth()->user()->name}}</button></a>
                @endif
                @if(auth()->user()->nivel == 1)
                <a href="{{route('perfil')}}"><button type="button" style="margin-right: 10px" class="btn btn-outline-dark">{{auth()->user()->name}}</button></a>
                @endif
              <a href="{{route('logout')}}"><button type="button" class="btn btn-outline-dark">Logout</button></a>
              @else
              <a href="{{route('login')}}"><button type="button" class="btn btn-outline-dark">Login</button></a>
              <a href="{{route('select')}}"><button type="button" style="margin-left: 20px" class="btn btn-outline-dark">Cadastre-se</button></a>
              @endif
            </form>
          </div>
        </div>
      </nav>
      @yield('content')
      <div class="footer" style=" width: 100%; height: 110px; background-color: darkslategray; color: white; text-align: center; bottom: 0;">
        <div class="container">
        <div class="row">
            <div class="col" >
                <h5><strong>Contato</strong></h5>
                Telefone:<br>
                WhatsApp:<br>
                Email:<br>
            </div>
            <div class="col">
                <h5><strong>Redes sociais</strong></h5>
                Facebook:<br>
                Instagram:<br>
            </div>
          </div>
        </div>
      </div>
</body>
</html>