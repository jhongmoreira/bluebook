<?php 
  include("classes/database.php");
  $banco = new BancoDeDados;
  $noticia = $_GET['noticia'];
  $banco->query("SELECT * FROM noticias WHERE identificador = '$noticia'");
  $total = $banco->linhas();
  foreach ($banco->result() as $dados){}

?>
<head>
    <meta property="og:title" content="<?php echo $dados['titulo']; ?>">
    <meta property="og:description" content="<?php echo $dados['subtitulo']; ?>">
    <meta property="og:image" content="img/conteudo/<?php echo $dados['imagem_capa']; ?>">
</head>  
<div class="container-fluid mt-4">
  <div class="row">

    <div class="col-md-12"><h1><?php echo $dados['titulo']; ?></h1></div>

    <div class="col-md-12"><h4><?php echo $dados['subtitulo']; ?></h4></div>
    
    <div class="col-md-12"><small>Data de publicação: <?php echo $dados['data_noticia']; ?></small></div>

    <div class="col-md-12 text-center mt-3"><img class="img-thumbnail" src="img/conteudo/<?php echo $dados['imagem_capa']; ?>" alt="" srcset="">
  
  </div>

  <div class="row">
    <div class="col-md-12 p-5 text-justify">
      <?php echo $dados['conteudo']; ?>
    </div>
  </div>

  </div>
</div>