<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>   

<div class="row">
    <div class="col-md-12">
        <h1>Cadastrar Nova Empresa</h1>
        <hr>
    </div>
</div>

        <form method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nomeEmpresa">Nome</label>
                <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa">
            </div>

            <div class="form-group">
                <label for="foto" class="form-label">Logotipo</label>
                <input class="form-control" type="file" name="foto" id="foto">
            </div>

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
                <label for="telefoneEmpresa">Telefone</label>
                <input type="text" class="form-control" id="telefoneEmpresa" name="telefoneEmpresa">
            </div>

            <div class="form-group">
                <label for="whatsappEmpresa">Whatsapp</label>
                <input type="text" class="form-control" id="whatsappEmpresa" name="whatsappEmpresa">
            </div>

            <div class="form-group">
                <label for="siteEmpresa">Site</label>
                <input type="text" class="form-control" id="siteEmpresa" name="siteEmpresa">
            </div>

            <div class="form-group">
                <label for="instagramEmpresa">Instagram</label>
                <input type="text" class="form-control" id="instagramEmpresa" name="instagramEmpresa">
            </div>

            <div class="form-group">
                <label for="facebookEmpresa">Facebook</label>
                <input type="text" class="form-control" id="facebookEmpresa" name="facebookEmpresa">
            </div>

            <div class="form-group">
                <label for="emailEmpresa">E-mail</label>
                <input type="text" class="form-control" id="emailEmpresa" name="emailEmpresa">
            </div>

            <div class="form-group">
                <label for="ruaEmpresa">Rua</label>
                <input type="text" class="form-control" id="ruaEmpresa" name="ruaEmpresa">
            </div>

            <div class="form-group">
                <label for="numeroEmpresa">Número</label>
                <input type="text" class="form-control" id="numeroEmpresa" name="numeroEmpresa">
            </div>

            <div class="form-group">
                <label for="bairroEmpresa">Bairro</label>
                <input type="text" class="form-control" id="bairroEmpresa" name="bairroEmpresa">
            </div>

            <div class="form-group">
                <label for="cidadeEmpresa">Cidade</label>
                <input type="text" class="form-control" id="cidadeEmpresa" name="cidadeEmpresa">
            </div>
    
            <button type="submit" class="btn btn-primary mt-2 mb-5">Enviar</button>

        </form>
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

  $nome = addslashes($_POST["nomeEmpresa"]);
  $logotipo = $fotoCapa;
  $categoria = addslashes($_POST["idCategoria"]);  
  $telefone = addslashes($_POST["telefoneEmpresa"]);
  $whatsapp = addslashes($_POST["whatsappEmpresa"]);
  $site = addslashes($_POST["siteEmpresa"]);
  $instagram = addslashes($_POST["instagramEmpresa"]);
  $facebook = addslashes($_POST["facebookEmpresa"]);
  $email = addslashes($_POST["emailEmpresa"]);
  $rua = addslashes($_POST["ruaEmpresa"]);
  $numero = addslashes($_POST["numeroEmpresa"]);
  $bairro = addslashes($_POST["bairroEmpresa"]);
  $cidade = addslashes($_POST["cidadeEmpresa"]);

    $banco->query("INSERT INTO empresas VALUES(null, '$nome', '$logotipo', $categoria, '$telefone', '$whatsapp', '$site', '$instagram', '$facebook', '$email', '$rua', $numero, '$bairro', '$cidade', 1)");

    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro inserido com sucesso</div>";
        // echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=1'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
    }
}
?>