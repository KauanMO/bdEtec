<?php

include_once "conexao.php";

$pdo = Conexao::conectar();

$idCategoria = $_POST["txIdCategoria"];
$categoria = $_POST["txCategoria"];

if ($idCategoria > 0) {
    $stmt = $pdo->prepare("update tbCategoria set 
        categoria='$categoria'
       where idCategoria='$idCategoria'");
} else {
    $stmt = $pdo->prepare("insert into tbcategoria values(null,'$categoria');");
}

$stmt->execute();

header("location:categoria-exibir.php");
?>
