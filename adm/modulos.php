<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $idCurso = $_GET['curso'];
?>

<h1>Editar Módulos</h1>

<div class="container-fluid">
<?php
$banco->query("SELECT * FROM modulos WHERE id_curso = $idCurso");
$total = $banco->linhas();

if ($total != 0){
    foreach ($banco->result() as $dados)
    {     
?> 
<div><a href="index.php?pg=3&modulo=<?php echo $dados['id_modulo']; ?>"><?php echo $dados['nome_modulo'];?></a> <a href="index.php?pg=7&modulo=<?php echo $dados['id_modulo']; ?>"><li class="fa fa-list"></li></a></div>
<?php
    }
}
?>
    </div>
