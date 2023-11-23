<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>

<div class="row">
    <div class="col-md-12">
        <h1>Empresas cadastradas</h1>
        <hr>
    </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Empresa</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
        <?php
            $banco->query("SELECT * FROM  categorias, empresas WHERE categoria_empresa = id_categoria");
            $total = $banco->linhas();
        
            if ($total != 0){
                foreach ($banco->result() as $dados)
                {     
        ?> 
    <tr>
            <th scope="row"><?php echo $dados['id_empresa']; ?></th>
            <td><?php echo $dados['nome_empresa']; ?></td>
            <td>
                <a class="m-1" href="index.php?pg=3&empresa=<?php echo $dados['id_empresa']; ?>"><li class="fa fa-pen"></li></a>
                <a class="m-1" href="index.php?pg=4&empresa=<?php echo $dados['id_empresa']; ?>"><li class="fa fa-box-archive"></li></a>
            </td>
    </tr>
    <?php
        }
    }
    ?>
    </tbody>
</table>
