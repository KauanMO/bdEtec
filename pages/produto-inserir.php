<?php
$produto = $_POST["txProduto"];
$idCat = $_POST["txIdCategoria"];
$valor = $_POST["txValor"];
$quantidade = $_POST["QntProduto"];

include "conexao.php";

$stmt = $pdo->prepare(
    "insert into tbProduto values(null,'$produto','$idCat','$valor','$QntProduto')"
);
$stmt->execute();

header("location:produto-exibir.php");
?>
