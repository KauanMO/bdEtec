<?php

include_once "conexao.php";

$pdo = Conexao::conectar();

//DOMPDF
$resultado ="";

		$stmt = $pdo -> prepare("select * from tbproduto");
		$stmt ->execute();

		while($row = $stmt->fetch(PDO::FETCH_BOTH)){
      $resultado .= "<tr><td style='border: 1px solid black;border-collapse: collapse; text-align:center'> <font face='Verdana, Geneva, sans-serif'>" . $row['idProduto'] ."</td>";
      $resultado .= "<td style='border: 1px solid black;border-collapse: collapse; text-align:center'> <font face='Verdana, Geneva, sans-serif'>" . $row['produto'] ."</td>";
			$resultado .= "<td style='border: 1px solid black;border-collapse: collapse; text-align:center'> <font face='Verdana, Geneva, sans-serif'>" . $row['idCategoria'] ."</td>";
      $resultado .= "<td style='border: 1px solid black;border-collapse: collapse; text-align:center'> <font face='Verdana, Geneva, sans-serif'>" . $row['valor'] ."</td>";
      $resultado .= "<td style='border: 1px solid black;border-collapse: collapse; text-align:center'> <font face='Verdana, Geneva, sans-serif'>" . $row['quantidade'] ."</td></tr>";
		}

    $tabela = "<table style='border-collapse: collapse; width: 100%' >
    <tr style='border-collapse: collapse;'>
      <td style='border: 1px solid black;border-collapse: collapse; text-align:center'><font size = '4' face='Verdana, Geneva, sans-serif'>Id do Produto</font></td>
      <td style='border: 1px solid black;border-collapse: collapse; text-align:center'><font size = '4' face='Verdana, Geneva, sans-serif'>Produto</font></td>
      <td style='border: 1px solid black;border-collapse: collapse;text-align:center'><font size = '4' face='Verdana, Geneva, sans-serif'>Categoria</font></td>
      <td style='border: 1px solid black;border-collapse: collapse;text-align:center'><font size = '4' face='Verdana, Geneva, sans-serif'>Valor</font></td>
      <td style='border: 1px solid black;border-collapse: collapse;text-align:center'><font size = '4' face='Verdana, Geneva, sans-serif'>Quantidade</font></td>
    </tr>
  ".$resultado;

    require_once("../dompdf/autoload.inc.php");

    use Dompdf\Dompdf;

    $dompdf = new DOMPDF();

    $dompdf->load_html(
      "	<center><h1 style='font-family:verdana'> Produtos Cadastradas </h1></center>
        	$tabela;
      "
    );

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream(
      "produtos.pdf", 
      array(
        "Attachment" => false
      )
    );
?>