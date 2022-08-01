<?php
require_once "../conexao.php";

$con = conexao::conectar();
$stmt = $con->prepare("SELECT idCategoria, categoria FROM tbCategoria");
$stmt->execute();

$data = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}
echo json_encode($data);
?>
