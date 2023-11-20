<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>   

<h1>Nova Notícia</h1>

    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="idCategoria">Categoria:</label>
                <select name="idCategoria" id="idCategoria" class="form-control">
                    <?php
                        $banco->query("SELECT * FROM categorias");
                        $total = $banco->linhas();

                        if ($total != 0){
                            foreach ($banco->result() as $dados)
                            {     
                    ?> 
                    <option value="<?php echo $dados['id_categoria'];?>"><?php echo $dados['nome_categoria'];?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tituloNoticia">Título</label>
                <input type="text" class="form-control" id="tituloNoticia" name="tituloNoticia">
            </div>

            <div class="form-group">
                <label for="resumoNoticia">Subtítulo</label>
                <input type="text" class="form-control" id="resumoNoticia" name="resumoNoticia">
            </div>

            <div class="form-group">
                <label for="uriNoticia">URI</label>
                <input type="text" class="form-control" id="uriNoticia" name="uriNoticia">
            </div>

            <div class="form-group">
                <label for="imgCapa">Imagem de Destaque</label>
                <input type="text" class="form-control" id="imgCapa" name="imgCapa">
            </div>

            <div class="form-group">
                <label for="dataNoticia">Data</label>
                <input type="date" class="form-control" id="dataNoticia" name="dataNoticia">
            </div>

            <div class="form-group mt-2 mb-2">
            <textarea id="div_editor1" name="div_editor1"></textarea>
            <script>
                var editor1 = new RichTextEditor("#div_editor1");
            </script>
            </div>
    
            <button type="submit" class="btn btn-primary mt-2 mb-5">Enviar</button>

        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
  $categoria = addslashes($_POST["idCategoria"]);
  $titulo = addslashes($_POST["tituloNoticia"]);
  $subtitulo = addslashes($_POST["resumoNoticia"]);
  $uri = addslashes($_POST["uriNoticia"]);
  $img = addslashes($_POST["imgCapa"]);
  $dt_noticia = addslashes($_POST["dataNoticia"]);
  $conteudoNoticia = addslashes($_POST["div_editor1"]);

    $banco->query("INSERT INTO noticias VALUES(null, $categoria, '$titulo', '$uri', '$subtitulo', '$dt_noticia', '$img', '$conteudoNoticia')");

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