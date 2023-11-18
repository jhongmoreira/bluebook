<?php 
  include("classes/database.php");
  $banco = new BancoDeDados;
?>

<div class="container-fluid mt-2">
<div class="row">
  <div class="col-md-12">
    <h1>Vagas de Emprego</h1>
    <hr>
  </div>
</div>
  <div class="row">
  <?php 
              $banco->query("SELECT * FROM  escolaridade, vagas, empresas WHERE cod_empresa = id_empresa AND cod_escolaridade = id_escolaridade ORDER BY id_vaga ASC");
              $total = $banco->linhas();

              if ($total != 0)
              {
                  foreach ($banco->result() as $dados)
                  {   
              ?> 
          <div class="col-md-2 mb-4">
                <div class="card p-1">
                    <img src="img/conteudo/<?php echo $dados['logotipo_empresa'];?>" class="card-img-top" alt="Logotipo da Exata Serviços">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><small><i class="fa-solid fa-briefcase"></i> <?php echo $dados['nome_vaga'];?></small></li>
                      <li class="list-group-item"><small><i class="fa fa-solid fa-graduation-cap"></i> <?php echo $dados['tipo_escolaridade'];?></small></li>
                    </ul>
                    <?php 
                        $status = ($dados['aberto'] == 1) ? "Disponível" : "Encerrado";
                        
                        $background_status = ($dados['aberto'] == 1) ? "text-bg-success" : "text-bg-danger";

                      ?>
                    <span class="categoria badge <?php echo $background_status; ?>">
                      <?php echo $status; ?>
                    </span>
                    <div class="card-body">
                    <a href="index.php?pg=7&vaga=<?php echo $dados['id_vaga'];?>" class="icon-link gap-1 icon-link-hover stretched-link text-center">
                      Ver
                    </a>                    
                  </div>
                </div>
            </div>
            <?php
                  }
                }
                ?>
</div>
</div>
