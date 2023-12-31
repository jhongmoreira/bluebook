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
  <div class="container">
            <div class="friend-list">
              <div class="row">
  <?php
    if ($total != 0)
    {
        foreach ($banco->result() as $dados)
        {   
  ?>
                        <div class="col-md-4 col-sm-6">
                      <div class="friend-card card">
                          <img src="img/conteudo/background_profile.jpg" alt="profile-cover" class="img-responsive cover">
                        <div class="card-info">
                          <img src="img/conteudo/<?php echo $dados['logotipo_empresa'];?>" alt="user" class="profile-photo-lg">
                          <div class="friend-info">
                            <p class="float-end text-green">São Gotardo</p>
                            <h5><a href="index.php?pg=4&cod=<?php echo $dados['id_empresa'];?>" class="profile-link"><?php echo $dados['nome_empresa'];?></a></h5>
                            <p class="categoria-empresa"><?php echo $dados['nome_categoria'];?></p>
                          </div>
                        </div>
                      </div>
                    </div>      

                  <?php
                      }
                    }
                  ?>
              </div>
            </div>
    </div>
</div>
</div>
