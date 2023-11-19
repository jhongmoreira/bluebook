<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>

<h1>Cursos</h1>

<div class="container-fluid">
    <?php
    $banco->query("SELECT * FROM cursos");
    $total = $banco->linhas();

    if ($total != 0){
        foreach ($banco->result() as $dados)
        {     
    ?> 
    <div><a href="index.php?pg=2&curso=<?php echo $dados['id_curso']; ?>"><?php echo $dados['nome_curso'];?></a> <a href="index.php?pg=9&curso=<?php echo $dados['id_curso']; ?>"><li class="fa fa-eye"></li></a></div>
    <?php
        }
    }
    ?>
</div>
