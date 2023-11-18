<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>
<div id="destaques" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#destaques" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#destaques" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <!-- <button type="button" data-bs-target="#destaques" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
            </div>

            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="banner-1"></div>
                <div class="container texto-container">
                  <div class="carousel-caption text-start">
                    <h1>Supermercado Central</h1>
                    <p>Sua compra com o melhor preço da cidade.</p>
                    <p><a class="btn btn-sm btn-primary" href="#">Acessar Feed</a></p>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="banner-2"></div>
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Farmácia São Sebastião</h1>
                    <p>Descontos imperdíveis em medicamentos genéricos</p>
                    <p><a class="btn btn-sm btn-primary" href="#">Acessar Feed</a></p>
                  </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#destaques" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#destaques" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container-fluid mt-4">

        <div class="row">
          <div class="col-md-12 mb-3">
            <h2>Atualizações</h2>
            <hr>
          </div>
        </div>


          <div class="row">
            <?php 
              $banco->query("SELECT * FROM noticias LIMIT 4");
              $total = $banco->linhas();

              if ($total != 0)
              {
                  foreach ($banco->result() as $dados)
                  {   
              ?> 

              <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column">
                    <strong class="d-inline-block mb-2 text-primary-emphasis"><?php echo $dados['categoria'];?></strong>
                    <h3 class="mb-0"><?php echo $dados['titulo'];?></h3>
                    <div class="mb-1 text-body-secondary"><?php echo $dados['data_noticia'];?></div>
                    <p class="card-text mb-auto"><?php echo $dados['subtitulo'];?></p>
                    <a href="index.php?pg=1&noticia=<?php echo $dados['identificador'];?>" class="icon-link gap-1 icon-link-hover stretched-link">
                      Ler
                    </a>
                  </div>
                  <div class="col-auto d-none d-lg-block">
                    <img src="img/conteudo/<?php echo $dados['imagem_capa'];?>" height="250" alt="" srcset="">
                  </div>
                </div>
              </div>

              <?php

                  }
                }

                ?>

              
              <div class="col-md-12 mt-4 mb-5 d-flex justify-content-center">
                <a href="index.php?pg=2" class="icon-link">
                  Ver todas as Notícias
                </a>
              </div>
          </div>

          
          <div class="row">
            <div class="col-md-12 mb-3">
              <h2>Empresas</h2>
              <hr>
            </div>
          </div>

          <div class="row">
          <?php 
              $banco->query("SELECT * FROM  categorias, empresas WHERE categoria_empresa = id_categoria LIMIT 4");
              $total = $banco->linhas();

              if ($total != 0)
              {
                  foreach ($banco->result() as $dados)
                  {   
              ?> 
            <div class="col-md-3 mb-4">
                <div class="card p-1">
                    <img src="img/conteudo/<?php echo $dados['logotipo_empresa'];?>" class="card-img-top" alt="Logotipo da Exata Serviços">
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

            <div class="col-md-12 mt-3 mb-5 d-flex justify-content-center">
              <a href="index.php?pg=5">
                Ver Empresas
              </a>
            </div>
          </div>

          <!-- Vagas de Emprego -->
          <div class="row">
            <div class="col-md-12 mb-3">
              <h2>Vagas de Emprego</h2>
              <hr>
            </div>
          </div>
          <section class="row">
          <?php 
              $banco->query("SELECT * FROM  escolaridade, vagas, empresas WHERE cod_empresa = id_empresa AND cod_escolaridade = id_escolaridade ORDER BY id_vaga ASC LIMIT 6 ");
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

            <div class="col-md-12 mt-5 mb-5 d-flex justify-content-center">
              <a href="index.php?pg=6">
                Ver todas as Vagas
              </a>
            </div>

          </section>
            </div>