<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG+ - Informação e Entretenimento em São Gotardo e Região</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="cdn/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="cdn/fa/css/fontawesome.min.css">
    <link rel="stylesheet" href="cdn/fa/css/brands.min.css">
    <link rel="stylesheet" href="cdn/fa/css/solid.min.css">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">SANGO+</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Feed</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Currículos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pg=3">WebTV</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2 bg-dark text-white" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning" type="submit">Pesquisas</button>
      </form>
    </div>
  </div>
</nav>
        <!-- <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none me-3">
              <img src="img/site/logo.svg" alt="Logotipo" width="40" height="32">
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Feed</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Currículos</a></li>
              <li><a href="index.php?pg=3" class="nav-link px-2 text-white">WebTV</a></li>
            </ul>
    
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
              <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>
    
            <div class="text-end">
              <button type="button" class="btn btn-warning">Pesquisar</button>
            </div>
          </div>
        </div> -->
      </header>

      <?php
        include_once("classes/pagina.php");
        $pagina = new Pagina;
      ?>    

      <footer class="py-3 my-1">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Afilie-se</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">SAC</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2023 SG+</p>
      </footer>
    

<!-- JavaScript CSS -->
<script src="cdn/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>