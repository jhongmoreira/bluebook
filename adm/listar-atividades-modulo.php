<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $idModulo = $_GET['modulo'];
?>

<h1>Editar Módulos</h1>

<div class="container-fluid">
<?php
$banco->query("SELECT * FROM atividades WHERE modulo_id = $idModulo");
$total = $banco->linhas();

if ($total != 0){
    foreach ($banco->result() as $dados)
    {     
?> 
<div><a href="index.php?pg=8&atividade=<?php echo $dados['id_atividade']; ?>"><?php echo $dados['nome_atividade'];?></a></div>
<?php
    }
}
?>
    </div>
