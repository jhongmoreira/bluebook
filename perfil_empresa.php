<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $cod = $_GET['cod'];
  $banco->query("SELECT * FROM categorias, empresas WHERE categoria_empresa = id_categoria AND id_empresa = '$cod'");
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
              <li class="breadcrumb-item"><a href="index.php?pg=5">Empresas</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $dados['nome_empresa'];?></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="img/conteudo/<?php echo $dados['logotipo_empresa'];?>" alt="Logo da Empresa" width="150">
                    <div class="mt-3">
                      <h4><?php echo $dados['nome_empresa'];?></h4>
                      <p class="text-secondary mb-1"><?php echo $dados['nome_categoria'];?></p>
                      <p class="text-muted font-size-sm"><?php echo $dados['cidade_empresa'];?></p>
                      <button class="btn btn-primary">Enviar Mensagem</button>
                      <!-- <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg> Website</h6>
                    <span class="text-secondary"><?php echo $dados['site_empresa'];?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Instagram</h6>
                    <span class="text-secondary"><?php echo $dados['instagram_empresa'];?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> Facebook</h6>
                    <span class="text-secondary"><?php echo $dados['facebook_empresa'];?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $dados['email_empresa'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Telefone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $dados['telefone_empresa'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Whatsapp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $dados['whatsapp_empresa'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Endereço</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $dados['rua_empresa'].", nº ".$dados['numero_empresa']." - ".$dados['bairro_empresa'];?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">vagas</i></h6>
                      <?php
                        $bancoVagaEmpresa = new BancoDeDados;
                        $bancoVagaEmpresa->query("SELECT * FROM vagas, empresas WHERE id_empresa = $cod AND cod_empresa = id_empresa ORDER BY id_vaga ASC");
                        $totalVagasEmpresa = $bancoVagaEmpresa->linhas();

                        if ($totalVagasEmpresa != 0)
                        {
                            foreach ($bancoVagaEmpresa->result() as $dadosVaga)
                            {   
                      ?>

                      <?php 
                        $status = ($dadosVaga['aberto'] == 1) ? "Disponível" : "Encerrado";
                        
                        $background_status = ($dadosVaga['aberto'] == 1) ? "text-bg-success" : "text-bg-danger";

                      ?>

                      <span class="badge <?php echo $background_status; ?>">
                        <?php echo $status; ?>
                      </span>
                      
                      <div class="row p-2">
                        <a href="index.php?pg=7&vaga=<?php echo $dadosVaga['id_vaga'];?>" class="link-underline link-underline-opacity-0"><small><i class="fa-solid fa-briefcase"></i> <?php echo $dadosVaga['nome_vaga'];?></small></a>
                        <hr>
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
          </div>

        </div>
    </div>  
  </div>