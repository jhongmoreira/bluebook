<?php 
    include_once("funcoes/verificar_login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../cdn/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../cdn/fa/css/fontawesome.min.css">
    <link rel="stylesheet" href="../cdn/fa/css/brands.min.css">
    <link rel="stylesheet" href="../cdn/fa/css/solid.min.css">
    <script src="jquery.min.js"></script>
    <!--Include the JS & CSS-->
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Gestão</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <div class="dropdown m-1">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastrar
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?pg=1">Empresa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown m-1">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Listar
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?pg=2">Empresas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
        <!-- Inicio -->
            <?php
                include_once("classes/pagina.php");
                $pagina = new Pagina;
            ?>
        </div>
    </div>
<!-- JavaScript CSS -->
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="cdn/bootstrap/js/bootstrap.min.js"></script>
<script src="../cdn/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>