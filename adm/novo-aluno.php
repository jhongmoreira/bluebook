<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>

<h1>Novo Aluno</h1>
  
    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="nomeAluno">Nome</label>
                <input type="text" class="form-control" id="nomeAluno" name="nomeAluno">
            </div>

            <div class="form-group">
                <label for="UsuarioId">Usuário</label>
                <input type="text" class="form-control" id="UsuarioId" name="UsuarioId">
            </div>

            <!-- <div class="form-group">
                <label for="modulos">N° de Módulos</label>
                <input type="text" class="form-control" id="modulos" name="modulos">
            </div> -->

            <div class="form-group">
                <label for="SenhaId">Senha</label>
                <input type="text" class="form-control" id="SenhaId" name="SenhaId">
            </div>

            <label for="idTipo">Tipo:</label>
                <select name="idTipo" id="idTipo" class="form-control">                    
                    <option value="estudante">Estudante</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            
    
            <button type="submit" class="btn btn-primary mt-2 mb-5">Enviar</button>

        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $nome_aluno = addslashes($_POST["nomeAluno"]);
  $usuario_aluno = addslashes($_POST["UsuarioId"]);
  $senha_aluno = addslashes($_POST["SenhaId"]);
  $tipo = addslashes($_POST["idTipo"]);

  if ($tipo == 'estudante'){
    $tipo = 0;
  }else{
    $tipo = 1;
  }


    $banco->query("INSERT INTO usuario VALUES(null, '$nome_aluno', '$usuario_aluno', '$senha_aluno', $tipo)");

    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro inserido com sucesso</div>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=0'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
    }
}
?>
    </div>

</body>

</html>