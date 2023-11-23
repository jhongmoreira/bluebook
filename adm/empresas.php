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
            <td><a target="_blank" href="../index.php?pg=4&cod=<?php echo $dados['id_empresa']; ?>"><?php echo $dados['nome_empresa']; ?></a></td>
            <td>
                <a class="m-1" href="index.php?pg=3&empresa=<?php echo $dados['id_empresa']; ?>"><li class="text-success fa fa-pen"></li></a>
                <a class="m-1" href="index.php?pg=5&empresa=<?php echo $dados['id_empresa']; ?>"><i class="text-info fa-solid fa-image"></i></li></a>
                  <?php 
                    if ($dados['publica'] == 1){
                  ?>             
                    <a class="m-1" href="index.php?pg=6&publicar=nao&empresa=<?php echo $dados['id_empresa']; ?>"><li class="text-danger fa fa-box-archive"></li></a>
                  <?php
                    }else{
                    ?>
                      <a class="m-1" href="index.php?pg=6&publicar=sim&empresa=<?php echo $dados['id_empresa']; ?>"><li class="text-warning fa fa-upload"></li></a>
                    <?php
                    }
                  ?>
            </td>
    </tr>
    <?php
        }
    }
    ?>
    </tbody>
</table>
