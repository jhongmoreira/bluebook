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
              $banco->query("SELECT * FROM empresas LIMIT 4");
              $total = $banco->linhas();

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
                    <a href="index.php?pg=1&noticia=#" class="icon-link gap-1 icon-link-hover stretched-link text-center">
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
              <a href="#">
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

            <div class="col-md-3 mb-2">
              <div class="text-center">
                <img src="img/conteudo/logo_moreira.png" height="50px" alt="" srcset="">
              </div>
              <h4>Ajudante de Cozinha</h4>  
              <p class="m-0"><i class="fa-solid fa-money-bill"></i> R$ 1.600,00</p>
              <p class="m-0"><i class="fa-solid fa-graduation-cap"></i> Ensino Fundamental</p>
              <a href="#">
                <i class="mt-2 fa-solid fa-circle-plus"></i>
              </a>            
            </div>

            <div class="col-md-3 mb-2">
              <div class="text-center">
                <img src="img/conteudo/logo_exata.png" height="50px" alt="" srcset="">
              </div>
              <h4>Designer Gráfico</h4>  
              <p class="m-0"><i class="fa-solid fa-money-bill"></i> <i>A combinar</i></p>
              <p class="m-0"><i class="fa-solid fa-graduation-cap"></i> Ensino Superior</p>
              <a href="#">
                <i class="mt-2 fa-solid fa-circle-plus"></i>
              </a>            
            </div>

            <div class="col-md-3 mb-2">
              <div class="text-center">
                <img src="img/conteudo/logo_eficaz.png" height="50px" alt="" srcset="">
              </div>
              <h4>Ajudante de Serviços</h4>  
              <p class="m-0"><i class="fa-solid fa-money-bill"></i> <i>A combinar</i></p>
              <p class="m-0"><i class="fa-solid fa-graduation-cap"></i> Ensino Fundamental</p>
              <a href="#">
                <i class="mt-2 fa-solid fa-circle-plus"></i>
              </a>            
            </div>

            <div class="col-md-3 mb-2">
              <div class="text-center">
                <img src="img/conteudo/logo_arquiplant.png" height="50px" alt="" srcset="">
              </div>
              <h4>Pedreiro</h4>  
              <p class="m-0"><i class="fa-solid fa-money-bill"></i> R$ 3.200</p>
              <p class="m-0"><i class="fa-solid fa-graduation-cap"></i> Ensino Fundamental</p>
              <a href="#">
                <i class="mt-2 fa-solid fa-circle-plus"></i>
              </a>            
            </div>

            <div class="col-md-12 mt-5 mb-5 d-flex justify-content-center">
              <a href="#">
                Ver todas as Vagas
              </a>
            </div>

          </section>
            </div>