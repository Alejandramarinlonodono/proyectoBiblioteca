<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biblioteca</title>
        <!-- Fonts -->

        <!-- Styles -->
        <link href="{{ mix('css/publica.css') }}" rel="stylesheet">
        <script src="{{ mix('/js/app.js') }}"></script>
    </head>
    <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Biblioteca</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('login') }}">Ingresar <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
      </li>
  </div>
</nav>
    <body class="container">
        <div class="">
        </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://www.uam.es/uam/media/img/1606854299161/banner.jpg" class="d-block w-180" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Biblioteca UAM</h5>
        <p>Pide tus libros en la pagina virtual</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://archivo.autonoma.edu.co/sites/default/files/imagenes-articulos/imagen-principal/biblioteca_alfonso_borrero_cabal.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Biblioteca UAM</h5>
        <p>Pide tus libros en la pagina virtual</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://archivo.autonoma.edu.co/sites/default/files/imagenes-articulos/imagen-principal/general-biblioteca-uam-editada.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Biblioteca UAM</h5>
        <p>Pide tus libros en la pagina virtual</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Hecho en la UAM</h1>
    <p class="lead">Prestacion de libros en la universidad autonoma de manizales</p>
  </div>
</div>
    </body>
</html>
