<?php 
  include("classes/database.php");
  $banco = new BancoDeDados;

  $banco->query("SELECT * FROM categorias, noticias WHERE categoria = id_categoria");
  $total = $banco->linhas();

?>

<div class="container-fluid mt-2">
<div class="row">
  <div class="col-md-12">
    <h1>Todas as notícias</h1>
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
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column">
          <strong class="d-inline-block mb-2 text-primary-emphasis"><?php echo $dados['nome_categoria'];?></strong>
          <h3 class="mb-0"><?php echo $dados['titulo'];?></h3>
          <div class="mb-1 text-body-secondary"><?php echo dataFormato($dados['data_noticia']);?></div>
          <p class="card-text mb-auto"><?php echo $dados['subtitulo'];?></p>
          <a href="index.php?pg=1&noticia=<?php echo $dados['identificador'];?>" class="icon-link gap-1 icon-link-hover stretched-link">
            Ler
          </a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="img/conteudo/<?php echo $dados['imagem_capa'];?>" class="thumb-noticia">
        </div>
      </div>
    </div>
<?php
      }
    }
?>
</div>
</div>
