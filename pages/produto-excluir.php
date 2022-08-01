<?php

include_once "conexao.php";

$pdo = Conexao::conectar();

$id = $_GET["id"];

$stmt = $pdo->prepare("delete from tbProduto where idProduto='$id'");
$stmt->execute();

header("location:produto-exibir.php");
?>
