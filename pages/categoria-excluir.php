<?php

$id = $_GET["id"];

include_once "conexao.php";

$pdo = Conexao::conectar();

$stmt = $pdo->prepare(
    "SET FOREIGN_KEY_CHECKS=0; DELETE FROM tbcategoria WHERE idCategoria = '$id'; SET FOREIGN_KEY_CHECKS=1;"
);
$stmt->execute();

header("location:Categoria-exibir.php");
?>
