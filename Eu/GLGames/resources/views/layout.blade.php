<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLGames</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-danger px-3">
    <a class="navbar-brand" href="{{route('home')}}"><i class="fa-solid fa-computer"></i>Informatics</a>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <div class="navbar-nav">
      <a href="{{ route('home') }}" class="nav-link active">Home</a>
        <a href="{{ route('categoria') }}" class="nav-link">Categorias</a>
        <a href="{{ route('cadastrar') }}" class="nav-link">Cadastrar</a>
        <a href="{{ route('ver_carrinho')  }}" class="nav-link">Carrinho</a>
      </div>
  </div>
</nav>



    <div class="container">
        <div class="row">
            <!--adicionar conteúdo-->
            @yield("conteudo")


        </div>
    </div>
          
</body>
</html>