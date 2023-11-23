<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
  $idEmpresa = $_GET['empresa'];
  $banco->query("SELECT * FROM  categorias, empresas WHERE categoria_empresa = id_categoria AND id_empresa = $idEmpresa");
  $total = $banco->linhas();

    if ($total != 0){
        foreach ($banco->result() as $dados){ }
    };   
?>   

<div class="row">
    <div class="col-md-12">
        <h1>Editando...</h1>
        <hr>
    </div>
</div>

        <form method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nomeEmpresa">Nome</label>
                    <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" value="<?php echo $dados["nome_empresa"]; ?>">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="idCategoria">Categoria:</label>
                    <select name="idCategoria" id="idCategoria" class="form-control">
                        <?php
                            $bancoCategoria = new BancoDeDados;
                            $bancoCategoria->query("SELECT * FROM categorias");
                            $totalCategoria = $bancoCategoria->linhas();

                            if ($totalCategoria != 0){
                                foreach ($bancoCategoria->result() as $dadosCategoria)
                                { 
                                $selected = ($dados["categoria_empresa"] == $dadosCategoria["id_categoria"]) ? "selected" : "";  
                        ?> 
                        <option <?php echo  $selected; ?> value="<?php echo $dadosCategoria['id_categoria'];?>"><?php echo $dadosCategoria['nome_categoria'];?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="telefoneEmpresa">Telefone</label>
                    <input type="text" class="form-control" id="telefoneEmpresa" name="telefoneEmpresa" value="<?php echo $dados["telefone_empresa"]; ?>">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="whatsappEmpresa">Whatsapp</label>
                    <input type="text" class="form-control" id="whatsappEmpresa" name="whatsappEmpresa" value="<?php echo $dados["whatsapp_empresa"]; ?>">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="siteEmpresa">Site</label>
                    <input type="text" class="form-control" id="siteEmpresa" name="siteEmpresa" value="<?php echo $dados["site_empresa"]; ?>">
                </div>
            </div>

            <div class="col-md-2">                
                <div class="form-group">
                    <label for="instagramEmpresa">Instagram</label>
                    <input type="text" class="form-control" id="instagramEmpresa" name="instagramEmpresa" value="<?php echo $dados["instagram_empresa"]; ?>">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="facebookEmpresa">Facebook</label>
                    <input type="text" class="form-control" id="facebookEmpresa" name="facebookEmpresa" value="<?php echo $dados["facebook_empresa"]; ?>">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="emailEmpresa">E-mail</label>
                    <input type="text" class="form-control" id="emailEmpresa" name="emailEmpresa" value="<?php echo $dados["email_empresa"]; ?>">
                </div>
            </div>
        </div>      
        
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="ruaEmpresa">Rua</label>
                    <input type="text" class="form-control" id="ruaEmpresa" name="ruaEmpresa" value="<?php echo $dados["rua_empresa"]; ?>">
                </div>
            </div>

            <div class="col-md-1">
                <div class="form-group">
                    <label for="numeroEmpresa">Número</label>
                    <input type="text" class="form-control" id="numeroEmpresa" name="numeroEmpresa" value="<?php echo $dados["numero_empresa"]; ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="bairroEmpresa">Bairro</label>
                    <input type="text" class="form-control" id="bairroEmpresa" name="bairroEmpresa" value="<?php echo $dados["bairro_empresa"]; ?>">
                </div>
            </div>

            <div class="col-md-3">                
                <div class="form-group">
                    <label for="cidadeEmpresa">Cidade</label>
                    <input type="text" class="form-control" id="cidadeEmpresa" name="cidadeEmpresa" value="<?php echo $dados["cidade_empresa"]; ?>">
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>  
        </form>

        <div class="row">
            <div class="col-md-12">
<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST'){

  $nome = addslashes($_POST["nomeEmpresa"]);
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

    $banco->query("UPDATE empresas SET nome_empresa = '$nome', categoria_empresa = $categoria, telefone_empresa = '$telefone', whatsapp_empresa = '$whatsapp', site_empresa = '$site', instagram_empresa = '$instagram', facebook_empresa = '$facebook', email_empresa = '$email', rua_empresa = '$rua', numero_empresa = $numero, bairro_empresa = '$bairro', cidade_empresa = '$cidade' WHERE id_empresa = $idEmpresa");
    
    $total = $banco->linhas();

    if ($total != 0)
    {
        echo "<div class='alert alert-info'>Registro atualizado</div>";
        echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=2'/>";
    }else
    {
        echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
    }
}
?>
                
    </div>
</div>