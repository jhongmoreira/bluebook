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
        include "./lista-cursos.php";
        break;

      case 2:
        include "./modulos.php";
        break;

      case 3:
        include "./editar.php";
        break;
        
      case 4:
        include "./novo-curso.php";
        break;

      case 5:
        include "./novo-modulo.php";
        break;

      case 6:
        include "./nova-atividade.php";
        break;

      case 6:
        include "./nova-atividade.php";
        break;

      case 60:
        include "./nova-atividade-arquivo.php";
        break;

      case 7:
        include "./listar-atividades-modulo.php";
        break;

      case 8:
        include "./editar-atividade.php";
        break;

      case 9:
        include "./editar-curso.php";
        break;

      case 10:
        include "./nova-matricula.php";
        break;
    
      case 11:
        include "./novo-aluno.php";
        break;
  }
}
}
