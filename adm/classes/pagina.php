<?php
class Pagina
{
  private $pagina;

  public function __construct()
  {
    if (!isset($_GET["pg"])) {
      $_GET["pg"] = 0;
    }

    $this->pagina = $_GET["pg"];


    if (!isset($this->pagina)) {
      $this->pagina = 0;
    }

    switch ($this->pagina) {
      case 0:
        include "./inicio.php";
        break;

      case 1:
        include "./nova_empresa.php";
        break;

      case 2:
        include "./empresas.php";
        break;

      case 3:
        include "./editar_empresa.php";
        break;
        
      case 4:
        include "./novo-curso.php";
        break;

      case 5:
        include "./editar_logo.php";
        break;

      case 6:
        include "./arquivar_empresa.php";
        break;
  }
}
}
