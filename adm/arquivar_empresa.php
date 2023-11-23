<div class="row mt-2">
    <div class="col-md-12">
<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $idEmpresa = $_GET['empresa'];
  $publicar = $_GET['publicar'];

  if ($publicar == "sim"){
      $banco->query("UPDATE empresas SET publica = 1 WHERE id_empresa = $idEmpresa");
    }else{
      $banco->query("UPDATE empresas SET publica = 0 WHERE id_empresa = $idEmpresa");
  }


    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Empresa arquivada.</div>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=2'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
    }

?>
        
    </div>
</div>

      
      