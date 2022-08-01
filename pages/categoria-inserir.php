<?php
$Categoria = $_POST["txCategoria"];

include "conexao.php";

$stmt = $pdo->prepare("insert into tbCategoria values(null,'$Categoria')");
$stmt->execute();

header("location:Categoria-exibir.php");
?>
