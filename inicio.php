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

      <div class="row justify-content-center mb-5 mt-5">
        <div class="col-md-8">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Digite a empresa ou categoria" aria-label="Search">
            <button class="btn btn-warning" type="submit">Pesquisar</button>
          </form>
        </div>
      </div>

          <div class="container">
            <div class="friend-list">
              <div class="row">
                <?php 
                  $banco->query("SELECT * FROM  categorias, empresas WHERE categoria_empresa = id_categoria LIMIT 4");
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

        </div>
      </section>
