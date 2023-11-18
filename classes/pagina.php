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
        include "./noticia.php";
        break;

      case 2:
        include "./todas_noticias.php";
        break;

      case 3:
        include "./webtv.php";
        break;
        
      case 4:
        include "./perfil_empresa.php";
        break;

      case 5:
        include "./lista_empresas.php";
        break;

      case 6:
        include "./todas_vagas.php";
        break;

      case 7:
        include "./vaga_emprego.php";
        break;
  }
}
}
