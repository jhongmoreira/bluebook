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



      <section class="container-fluid mt-4">

      <div class="row">
        <div class="col-md-12 text-center">
          <h3 class="p-0 m-0">Pesquise por uma empresa</h3>
        </div>
      </div>

      <div class="row justify-content-center mb-5 mt-3">
        <div class="col-md-8">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Digite a empresa ou categoria" aria-label="Search">
            <button class="btn btn-sm btn-primary" type="submit">Pesquisar</button>
          </form>
        </div>
      </div>

          <div class="container">

          <div class="row mb-2">
            <div class="col-md-12 titulos-home-border-left">
              <h3 class="border-titulo">
                <span class="titulos-home">
                  Empresas
                </span>
              </h3>
            </div>
          </div>

            <div class="friend-list">
              <div class="row">
                <?php 
                  $banco->query("SELECT * FROM  categorias, empresas WHERE categoria_empresa = id_categoria LIMIT 6");
                  $total = $banco->linhas();

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

            <div class="row">
              <div class="col-md-12 mt-3 mb-5 d-flex justify-content-left">
                <a href="index.php?pg=5" class="btn btn-sm btn-primary">
                  Ver Empresas
                </a>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="p-5 mb-5 bg-dark text-white rounded">
                  <h1>Tenha sua presença aqui</h1>
                  <p>Cadastre sua empresa, vagas de emprego e acesse currículos de São Gotardo e região.</p>
                  <button class="btn btn-secondary">Cadastrar-se</button>
                </div>
              </div>
            </div>
            

            <div class="row mb-2">
            <div class="col-md-12 titulos-home-border-left">
              <h3 class="border-titulo">
                <span class="titulos-home">
                  Vagas de Emprego
                </span>
              </h3>
            </div>
          </div>

            <div class="row">
            <?php 
              $banco->query("SELECT * FROM  escolaridade, vagas, empresas WHERE cod_empresa = id_empresa AND cod_escolaridade = id_escolaridade ORDER BY id_vaga ASC LIMIT 6 ");
              $total = $banco->linhas();

              if ($total != 0)
              {
                  foreach ($banco->result() as $dados)
                  {   
              ?> 
              <div class="col-md-3 mb-4">
                <div class="card" style="height: 7.5em;">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $dados['nome_vaga'];?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $dados['nome_empresa'];?></h6>
                      <p class="card-text">
                      <?php 
                            $status = ($dados['aberto'] == 1) ? "Disponível" : "Encerrado";                            
                            $background_status = ($dados['aberto'] == 1) ? "text-bg-success" : "text-bg-danger";
                        ?>
                        <span class="categoria badge <?php echo $background_status; ?>">
                            <?php echo $status; ?>
                        </span>
                      </p>
                    <a href="index.php?pg=7&vaga=<?php echo $dados['id_vaga'];?>" class="card-link">Ver Vaga</a>
                  </div>
                </div>
              </div>


            <?php
                  }
                }
            ?>
          </div>

          <div class="row">
              <div class="col-md-12 mt-3 mb-5 d-flex justify-content-left">
                <a href="index.php?pg=5" class="btn btn-sm btn-primary">
                  Ver Todas
                </a>
              </div>
            </div>

          

        </div>

        
      </section>
