<h1>Editando</h1>
<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $idAtividade = $_GET['atividade'];
  $banco->query("SELECT * FROM atividades where id_atividade = $idAtividade");
  $total = $banco->linhas();

    foreach ($banco->result() as $dados){};
    
?> 
    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="nomeAtividade">Nome do Módulo</label>
                <input type="text" class="form-control" id="nomeAtividade" name="nomeAtividade" value="<?php echo $dados["nome_atividade"]; ?>">
            </div>

            <label for="idTipo">Tipo:</label>
                <select name="idTipo" id="idTipo" class="form-control">                    
                    <option value="pdf">PDF</option>
                    <option value="txt">HTML</option>
                    <option value="frame">Frame</option>
                </select>

            <div class="form-group mt-2 mb-5">
            <textarea id="div_editor1" name="conteudo">
            <?php echo $dados['conteudo_atividade']; ?>
            </textarea>
            <script>
                var editor1 = new RichTextEditor("#div_editor1");
            </script>
            </div>
    
            <button type="submit" class="btn btn-primary mb-5">Enviar</button>

        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $nome_atividade = addslashes($_POST["nomeAtividade"]);
  $tipo = addslashes($_POST["idTipo"]);
  $conteudo = $_POST["conteudo"];
  $atividadeAtual = $idAtividade;

    $banco->query("UPDATE atividades SET nome_atividade = '$nome_atividade', conteudo_atividade = '$conteudo', tipo_atividade = '$tipo' WHERE id_atividade = $idAtividade");

    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro atualizado com sucesso</div>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=8&atividade=".$atividadeAtual."'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível editar dados.</div>";
    }
}
?>
    </div>

</body>

</html>