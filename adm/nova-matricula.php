<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>   

<h1>Matrícula</h1>

    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="idAluno">Aluno:</label>
                <select name="idAluno" id="idAluno" class="form-control">
                    <?php
                        $banco->query("SELECT * FROM usuario");
                        $total = $banco->linhas();

                        if ($total != 0){
                            foreach ($banco->result() as $dados)
                            {     
                    ?> 
                    <option value="<?php echo $dados['id_usuario'];?>"><?php echo $dados['nome'];?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="idCurso">Aluno:</label>
                <select name="idCurso" id="idCurso" class="form-control">
                    <?php
                        $banco->query("SELECT * FROM cursos");
                        $total = $banco->linhas();

                        if ($total != 0){
                            foreach ($banco->result() as $dados)
                            {     
                    ?> 
                    <option value="<?php echo $dados['id_curso'];?>"><?php echo $dados['nome_curso'];?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary mt-2 mb-5">Matricular</button>

        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $id_aluno = addslashes($_POST["idAluno"]);
  $id_curso = addslashes($_POST["idCurso"]);

    $banco->query("INSERT INTO matricula VALUES(null, $id_aluno, $id_curso, 1)");

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