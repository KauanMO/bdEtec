<?php

include_once "conexao.php";

$pdo = Conexao::conectar();

$usuario = $_POST["cadTxUsuario"];
$senha = $_POST["cadTxSenha"];
$confirmSenha = $_POST["cadTxConfirmSenha"];

if (strlen($usuario) < 4) {
    setcookie(
        "usuario-pequeno",
        $info = "Usuário muito pequeno",
        time() + 1,
        "/"
    );
    header("location:./pagCadastro.php");
}else if (strlen($senha) < 6) {
    setcookie(
        "senha-pequena",
        $info = "Senha muita pequena",
        time() + 1,
        "/"
    );
    header("location:./pagCadastro.php");
}

else if ($senha != $confirmSenha) {
   setcookie(
        "senhas-diferentes",
        $info = "Senhas não coincindem",
        time() + 1,
        "/"
    ); 
     header("location:./pagCadastro.php");
} else {
    $stmt = $pdo->prepare(
        "insert into tbUsuario values(null, '$usuario','$senha')"
    );
    $stmt->execute();
    header("location:../index.php");
}

?>
