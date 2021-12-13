@extends('layouts.navbarRodape')
@section('title', 'Mestreobra')
@section('content')

<div class="container">
    <h1 class="display-3">Bem-vindo ao Agiliza Serviços!</h1>
    <p class="lead">
        O lugar onde você encontra o prestador certo para realizar a sua obra.
    </p>
</div>
<section class="pedido">
    <div class="façapedido" style="text-align: center; color: deepskyblue;">
        <h2 class="h2">O que você precisa hoje?</h2>
    </div>
    <div class="container">
        @foreach($areas as $a)
            <a href="{{route('pedido', $a->id)}}"><button type="button" style="width: 350px; margin-bottom: 5px" class="btn btn-dark">{{$a->areaprincipal}}</button></a>
        @endforeach
    </div>
    <div class="teste" style="margin-top: 20px">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="{{url("storage/slide1.png")}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{url("storage/slide2.png")}}" class="d-block w-100" alt="...">
                </div>
                <!--<div class="carousel-item">
                  <img src="{{url("storage/slide3.jpeg")}}" class="d-block w-100" alt="...">
                </div>-->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
</section>
 


@endsection