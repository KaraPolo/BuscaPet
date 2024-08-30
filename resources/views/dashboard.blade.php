<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo') BuscaPet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: white;
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            bottom: 0;
            width: 100%;
            text-color: white;
            background-color: #198754;
            text-align: center;
            padding: 10px 0;
        }

        .content {
            flex: 1;
        }
        .navbar-dark .navbar-brand,
        .navbar-dark .navbar-nav .nav-link,
        .navbar-dark .navbar-toggler-icon,
        .btn-close-white {
            color: #f59342;
        }

        .dropdown-menu-dark .dropdown-item {
            color: #f59342;
        }

        .navbar-dark .navbar-toggler {
            border-color: #f59342;
        }

        .offcanvas-header {
            border-bottom: 1px solid #f59342;
        }

        .dropdown-menu-dark .dropdown-item:hover {
            background-color: #f59342;
            color: white;
        }
        footer a,
        footer .nav-link,
        footer i {
            color: #f59342 !important;
        }

        footer a:hover,
        footer .nav-link:hover,
        footer i:hover {
            color: #e4823a !important;
        }

        footer .text-center {
            background-color: #333;
            padding: 20px;
        }
    </style>
</head>

<body>
<div class="content">
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard">BuscaPet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">BuscaPet</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard">Página Inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="perdido">Animais Perdidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="encontrado">Animais Encontrados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="doacao">Adoção de Animais</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="atualizacao">Atualização de Animais Perdidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cuidado">Dicas de Cuidado</a>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </div>
</nav>
<br>

</div>
    <div>
        <div>
            @if ($errors->any())
                <b>Por favor, verifique os erros abaixo:</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="container mt-4">
            <div class="row">
                @yield('conteudo')
            </div>
        </div>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div style="position: relative;">
        <img src="https://img.freepik.com/fotos-gratis/proprietario-acariciando-gato-adoravel_23-2148740478.jpg?t=st=1724124367~exp=1724127967~hmac=8adad7c810c91815b325dc9cd35edb4e90cd45a5e9b6af792f965570106bd7eb&w=1380" 
             class="d-block w-100" alt="..." style="height: 400px; object-fit: cover;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4);"></div>
        <div class="carousel-caption d-none d-md-block" style="z-index: 2;">
          <h1>BuscaPet</h1>
          <p>Página dedicada ao cadastro de animais que estão desaparecidos.</p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-3 d-flex justify-content-center">
      <div class="card custom-card" style="width: 200px; height: 100px;">
        <div class="card-body text-center">
          <img src="https://images.vexels.com/content/144068/preview/cookie-bone-b94361.png" alt="Ícone" style="width: 30px; height: 30px;" class="mr-2">
          <p class="card-text custom-card-text">Cadastre seu Pet perdito</p>
        </div>
      </div>
    </div>
    <div class="col-3 d-flex justify-content-center">
      <div class="card custom-card" style="width: 200px; height: 100px;">
        <div class="card-body text-center">
          <img src="https://images.vexels.com/content/144068/preview/cookie-bone-b94361.png" alt="Ícone" style="width: 30px; height: 30px;" class="mr-2">
          <p class="card-text custom-card-text">Cadastre algum Pet de rua</p>
        </div>
      </div>
    </div>
    <div class="col-3 d-flex justify-content-center">
      <div class="card custom-card" style="width: 200px; height: 100px;">
        <div class="card-body text-center">
          <img src="https://images.vexels.com/content/144068/preview/cookie-bone-b94361.png" alt="Ícone" style="width: 30px; height: 30px;" class="mr-2">
          <p class="card-text custom-card-text">Adote um novo amigo</p>
        </div>
      </div>
    </div>
  </div>
  <br><br>
</div>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <img src="https://img.freepik.com/fotos-gratis/cao-pug-isolado-em-um-fundo-branco_2829-11416.jpg?t=st=1724126127~exp=1724129727~hmac=1aed11655313cb61a8023eb90424a9d01267d0bcbc01cd544201b119de41a906&w=740" alt="Imagem Descritiva" class="img-fluid" style="max-width: 70%; height: auto;">
    </div>
    <div class="col-md-6">
      <br><br><br><br><br><br>
      <center>
        <h2>Bem-vindo ao BuscaPet!</h2>
        <p>
          Nosso objetivo, além de ajudar a encontrar e reunir animais perdidos com seus donos, é também dar um novo lar a animais abandonados. Navegue pelo site para cadastrar ou encontrar
          animais desaparecidos e ajudar a trazer os nossos amigos peludos de volta para casa.
        </p>
      </center>
    </div>
  </div>
  <br><br>
</div>

    <div>
      <footer class="bg-dark text-light">
    <div class="container-fluid py-3">
    <div class="row">
      <div class="col-4">
        <ul class="nav flex-column">
          <li class="nav-link"><a href="dashboard">Página Inicial</a></li>
          <li class="nav-link"><a href="cuidado">Dicas de Cuidado</a></li>
          <li class="nav-link"><a href="#">Contato</a></li>
          <li class="nav-link"><a href="#">Suporte</a></li>
        </ul>
      </div>
      <div class="col-8">
<br><br>
        <ul class="nav">
          <li class="nav-link" ><i class="fab fa-facebook fa-3x "></i></li>
          <li class="nav-link"><i class="fab fa-instagram fa-3x"></i></li>
          <li class="nav-link"><i class="fab fa-twitter fa-3x"></i></li>
          <li class="nav-link"><i class="fab fa-whatsapp fa-3x"></i></li>
        </ul>
      </div>
    </div>
    </div>
    <div class="text-center" style="background-color: #333; padding: 20px;" >
      &copy 2024 BuscaPet. Todos os direitos reservados.
    </div>
  </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
