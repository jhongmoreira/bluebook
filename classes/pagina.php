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
        include "./lista.php";
        break;

      case 1:
        include "./curso.php";
        break;

      case 3:
        include "./modulo.php";
        break;

      case 4:
        include "./avaliacao_lista.php";
        break;

      case 5:
        include "./avaliacao.php";
        break;

      case 6:
        include "./finaliza-modulo.php";
        break;

      case 7:
        include "./reabre-modulo.php";
        break;

      case 8:
        include "./slide.php";
        break;
  }
}
}
