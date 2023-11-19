<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST')

{

    $cpf = isset($_POST["usuarioNome"]) ? addslashes(trim($_POST["usuarioNome"])) : FALSE;

    $senha = isset($_POST["usuarioSenha"]) ? addslashes(trim($_POST["usuarioSenha"])) : FALSE;

    if(!$senha || !$cpf){
        echo "Digite corretamente usuário e senha.";
        exit;
    }


    // $pwd_md5 = md5($senha);

    $banco = new BancoDeDados;
    $banco->query("SELECT * FROM adm WHERE usuario = '$cpf' and senha = '$senha'");

    foreach ($banco->result() as $dados) {}

    $total = $banco->linhas();

    date_default_timezone_set('America/Sao_Paulo');
    $data_agora = date('Y-m-d');
    $hora_agora = date('H:i:s');

    if ($total != 0)
    {
      $_SESSION["idUsrSAdm"] = $dados["id_usuario"];
      $_SESSION["nomeUsrSAdm"] = $dados["nome"];
      header("Location: index.php");
      die();
    }
}
?>
