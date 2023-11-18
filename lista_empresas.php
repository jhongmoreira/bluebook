<?php 
  include("classes/database.php");
  $banco = new BancoDeDados;

  $banco->query("SELECT * FROM empresas");
  $total = $banco->linhas();

?>

<div class="container-fluid mt-2">
<div class="row">
  <div class="col-md-12">
    <h1>Empresas</h1>
    <hr>
  </div>
</div>
  <div class="row">
  <?php
    if ($total != 0)
    {
        foreach ($banco->result() as $dados)
        {   
  ?>
    <div class="col-md-3 mb-4">
        <div class="card p-1">
            <img src="img/conteudo/<?php echo $dados['logotipo_empresa'];?>" class="card-img-top" alt="Logotipo da Exata Serviços">
            <!-- <div class="card-body"> -->
              <!-- <h5 class="card-title">Empresa Teste 01</h5> -->
              <!-- <p class="card-text">Empresa de Marketing/Publicidade.</p> -->
              <!-- <small>Marketing/Publicidade</small> -->
            <!-- </div> -->
            <span class="categoria badge text-bg-primary"><?php echo $dados['categoria_empresa'];?></span>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><small><i class="fa-brands fa-whatsapp"></i> <?php echo $dados['telefone_empresa'];?></small></li>
              <li class="list-group-item"><small><i class="fa fa-phone"></i> <?php echo $dados['whatsapp_empresa'];?></small></li>
              <li class="list-group-item"><small><i class="fa fa-envelope"></i> <?php echo $dados['email_empresa'];?></small></li>
            </ul>
            <div class="card-body">
            <a href="index.php?pg=4&cod=<?php echo $dados['id_empresa'];?>" class="icon-link gap-1 icon-link-hover stretched-link text-center">
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
