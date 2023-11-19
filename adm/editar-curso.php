<h1>Editando</h1>
<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $idCurso = $_GET['curso'];
  $banco->query("SELECT * FROM cursos where id_curso = $idCurso");
  $total = $banco->linhas();

    foreach ($banco->result() as $dados){};
    
?> 
    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="nomeCurso">Nome do Módulo</label>
                <input type="text" class="form-control" id="nomeCurso" name="nomeCurso" value="<?php echo $dados["nome_curso"]; ?>">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $dados["descricao_curso"]; ?>">
            </div>

            <div class="form-group">
                <label for="urlimg">Descrição</label>
                <input type="text" class="form-control" id="urlimg" name="urlimg" value="<?php echo $dados["imagem_curso"]; ?>">
            </div>
    
            <button type="submit" class="btn btn-primary mb-5 mt-2">Enviar</button>
        
        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $nome = addslashes($_POST["nomeCurso"]);
  $descricao = addslashes($_POST["descricao"]);
  $url = $_POST["urlimg"];
  $cursoAtual = $idCurso;

    $banco->query("UPDATE cursos SET nome_curso = '$nome', descricao_curso = '$descricao', imagem_curso = '$url' WHERE id_curso = $idCurso");

    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro atualizado com sucesso</div>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=9&curso=".$cursoAtual."'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível editar dados.</div>";
    }
}
?>
    </div>

</body>

</html>