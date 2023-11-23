<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $idEmpresa = $_GET['empresa'];
  $banco->query("SELECT id_empresa, logotipo_empresa FROM  empresas WHERE id_empresa = $idEmpresa");
  $total = $banco->linhas();

    if ($total != 0){
        foreach ($banco->result() as $dados){ }
    };   
?>   

<div class="row">
    <div class="col-md-12">
        <h1>Editando Logotipo</h1>
        <hr>
    </div>
</div>

        <form method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-3">
                <img class="img-thumbnail" src="../img/conteudo/<?php echo $dados['logotipo_empresa'];?>">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-5">
                <input class="form-control" type="file" name="foto" id="foto">
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-md-3">
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </div>

        </form>

        <div class="row">
            <div class="col-md-12">
<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST')
{

    $diretorio = "../img/conteudo/";

    // Gera um nome único para o arquivo
    $nome_arquivo = uniqid() . "_" . basename($_FILES["foto"]["name"]);

    // Caminho completo do arquivo no servidor
    $caminho_arquivo = $diretorio . $nome_arquivo;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho_arquivo)) {
        // Insere o nome do arquivo no banco de dados
        $fotoCapa = $nome_arquivo;
        }else{
            echo "Erro ao fazer upload";
        }

    $banco->query("UPDATE empresas SET logotipo_empresa = '$fotoCapa' WHERE id_empresa = $idEmpresa");

    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro inserido com sucesso</div>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=5&empresa=".$idEmpresa."'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
    }
}
?>
                
    </div>
</div>