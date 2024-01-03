<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $cod = $_GET['classificado'];
  $banco->query("SELECT * FROM  classificados, usuarios, tipo_classificado WHERE classificados.usuario_post = usuarios.id_usuario_portal AND classificados.tipo_classificado = id_tipo_post AND id_classificado = $cod ORDER BY id_classificado ASC LIMIT 9");
  $total = $banco->linhas();
  if ($total == 0){
    echo "<h1 class='p-5 text-center'>Erro 404<br>Nada encontrado</h1>";
  }else{
    foreach ($banco->result() as $dados){}
  }
?>
<div id="destaques" class="carousel slide" data-bs-ride="carousel">

  <div class="container-fluid mt-4">
  <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?pg=5">Classificados</a></li>
              <li class="breadcrumb-item active" aria-current="page">#<?php echo $dados['id_classificado'];?></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="mt-3">
                      <h4><?php echo $dados['nome_usuario_portal'];?></h4>
                      <p class="text-secondary mb-1">@<?php echo $dados['usuario_portal'];?></p>
                      <!-- <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Telefone</h6>
                    <span class="text-secondary"><?php echo $dados['celular_portal'];?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"> E-mail</h6>
                    <span class="text-secondary"><?php echo $dados['email_portal'];?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Categoria</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $dados['tipo_post'];?>
                    </div>
                  </div>                
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Anúncio</i></h6>
                      <?php
                        echo $dados['texto_classificado'];
                      ?>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
    </div>  
  </div>