<?php
require_once "./models/usuario.php";


try {
    $user = new Usuario();

    $lista = $user->listar(); 
} catch (\Throwable $th) {
    throw $th;
}
$usuario = $_POST["txUsuario"];
$senha = $_POST["txSenha"];

foreach ($lista as $linha => $coluna) {
    if (($lista[$linha]["nomeUsuario"] == $usuario) && ($lista[$linha]["senhaUsuario"] == $senha)) {
        session_start();
        $nomeSession = $lista[$linha]["nomeUsuario"];
        $senhaSession = $lista[$linha]["senhaUsuario"];

        $_SESSION["nome"] = $nomeSession;
        $_SESSION["senha"] = $senhaSession;
        $status = "aprovado";
    }
}

if ($status == "aprovado") {
    header("Location: dashboard.php");
} else {
    $info = "Login ou senha incorretos";
    setcookie("login-errado", $info, time() + 1, "/");
    header("Location: ./pagLogin.php");
}
