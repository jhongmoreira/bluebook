<?php 
  include("classes/database.php");
  $banco = new BancoDeDados;
  
  $categoria = @$_GET['categoria'];
  if (!isset($categoria)){
    $banco->query("SELECT * FROM categorias, empresas WHERE categoria_empresa = id_categoria");
  }else{
    $banco->query("SELECT * FROM categorias, empresas WHERE categoria_empresa = $categoria AND categoria_empresa = id_categoria");
  }
  $total = $banco->linhas();

?>

<div class="container-fluid mt-2">

<div class="row">
  <div class="col-md-12">
    <h1>Empresas</h1>
    <hr>
  </div>
</div>

<div class="row mb-3">
    <div class="dropdown">
      <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Categoria
      </button>
      <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="index.php?pg=5">Todos</a></li>
      <?php 
        $bancoCategoria = new BancoDeDados;
        $bancoCategoria->query("SELECT * FROM  categorias");
        $totalCategoria = $bancoCategoria->linhas();

        if ($totalCategoria != 0)
        {
            foreach ($bancoCategoria->result() as $dadosCategoria)
            {   
      ?> 

        <li><a class="dropdown-item" href="index.php?pg=5&categoria=<?php echo $dadosCategoria['id_categoria'];?>"><?php echo $dadosCategoria['nome_categoria'];?></a></li>

        <?php
            }
            // $bancoCategoria->query("SELECT * FROM  categorias");
            // $totalCategoria = $bancoCategoria->linhas();
          }
        ?>
        </ul>
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
            <span class="categoria badge text-bg-primary"><?php echo $dados['nome_categoria'];?></span>
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
