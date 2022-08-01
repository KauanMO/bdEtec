<?php include_once "../layout/cabecalho.html";
include_once "../layout/navPosLogin.html";
include_once "conexao.php";
include_once "sentinela.php";
?>

<div class="flex w-screen justify-center mr-">
<a href="../pages/produto-exibir.php" class="duration-600  mt-2 mb-5 flex h-10 w-72 items-center justify-center rounded-sm bg-gray-900 bg-opacity-50 text-center text-lg text-white shadow-xl drop-shadow-lg backdrop-blur-lg transition-all ease-linear hover:bg-gray-800 hover:text-white">
    <?php
    $pdo = Conexao::conectar();
    $stmt = $pdo->prepare("select count(*) from tbProduto");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM);
    echo "Total de produtos: $row[0]";
    ?>
  </a>
</div>

<?php include "../API/googleChartApi.php"; ?>
