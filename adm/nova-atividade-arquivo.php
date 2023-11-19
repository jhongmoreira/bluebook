<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>   

<h1>Novo Módulo</h1>

    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="idModulo">Modulo:</label>
                <select name="idModulo" id="idModulo" class="form-control">
                    <?php
                        $banco->query("SELECT * FROM modulos");
                        $total = $banco->linhas();

                        if ($total != 0){
                            foreach ($banco->result() as $dados)
                            {     
                    ?> 
                    <option value="<?php echo $dados['id_modulo'];?>"><?php echo $dados['nome_modulo'];?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
            <label for="idTipo">Tipo:</label>
                <select name="idTipo" id="idTipo" class="form-control">                    
                    <option value="pdf">Arquivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nomeAtividade">Nome da Atividade</label>
                <input type="text" class="form-control" id="nomeAtividade" name="nomeAtividade">
            </div>

            <div class="form-group">
                <label for="idConteudo">URL do Arquivo</label>
                <input type="text" class="form-control" id="idConteudo" name="conteudoAtividade">
            </div>
    
            <button type="submit" class="btn btn-primary mt-2 mb-5">Enviar</button>

        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $id_modulo = addslashes($_POST["idModulo"]);
  $tipo = addslashes($_POST["idTipo"]);
  $nome_atividade = addslashes($_POST["nomeAtividade"]);
  $conteudo = addslashes($_POST["conteudoAtividade"]);

    $banco->query("INSERT INTO atividades VALUES(null, '$nome_atividade', '$tipo', '$conteudo', '$id_modulo')");

    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro inserido com sucesso</div>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=1'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
    }
}
?>
    </div>