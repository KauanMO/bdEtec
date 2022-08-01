<?php

include_once "conexao.php";

$pdo = Conexao::conectar();

$idProduto = $_POST["txIdProduto"];
$produto = $_POST["txProduto"];
$idCategoria = $_POST["txtIdCategoria"];
$valor = $_POST["txValor"];
$quantidade = $_POST["QntProduto"];

if ($idProduto > 0) {
    $stmt = $pdo->prepare("update tbProduto set 
                             produto='$produto'
                            ,idCategoria='$idCategoria'
                            ,valor='$valor'
                            ,quantidade='$quantidade'
                            where idProduto='$idProduto'");
} else {
    $stmt = $pdo->prepare(
        "insert into tbproduto values(null,'$produto','$idCategoria','
        $valor','$quantidade');"
    );
}

$stmt->execute();

header("location:produto-exibir.php");
?>
