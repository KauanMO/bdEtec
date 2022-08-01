<?php include "../layout/cabecalho.html"; 
 include "../layout/navPosLogin.html"; 
 include "conexao.php"; 
 include_once "sentinela.php";
 ?>
<div class="flex justify-around">

<div class="flex flex-col mt-28 items-center">
<div class="mx-20 flex h-14 items-center uppercase bg-slate-800 px-5 font-bold shadow-sm  bg-opacity-80 backdrop-blur-lg rounded drop-shadow-lg">
    <h1 class="text-xl text-white">Registre um produto</h1>
  </div>
  <form
    method="post"
    action="produto-salvar.php"
    class="py-5 px-5 flex h-fit w-96 flex-col items-center justify-center bg-slate-900 shadow-2xl transition-all md:mb-[4.5rem] rounded-sm my-5  bg-opacity-90 backdrop-blur-lg  drop-shadow-lg"
  >
    <div>
      <input type="hidden" placeholder="idProduto" name="txIdProduto" value="<?php echo @$_GET[
          "idProduto"
      ]; ?>"/>
    </div>

    <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center">
      <div class="md:w-1/3">
        <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right">
          Nome do produto
        </label>
      </div>
      
      <div class="md:w-2/3">
        <input class="rounded-none border-b-[1.7px] border-white bg-inherit py-2 px-2 leading-tight text-white placeholder:text-gray-500 focus:border-blue-800 focus:outline-none md:mr-2"
        type="text" id="txProduto" name="txProduto" placeholder="Produto"
        value="<?php echo @$_GET["produto"]; ?>"/>
      </div>
    </div>

    <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center mr-[1.20rem]">
      <div class="md:w-1/3">
        <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right ">
          Categoria
        </label>
      </div>
      <div class="md:w-2/3">
        <?php
        $pdo = Conexao::conectar();
        $stmtCat = $pdo->prepare("select * from tbcategoria");
        $stmtCat->execute();
        ?>

        <?php $cat = @$_GET["categoria"]; ?>

        <select
          class="rounded-none border-b-[1.7px]  border-white bg-inherit   py-2 px-[2.7rem] leading-tight text-gray-500 placeholder:text-gray-500 focus:border-blue-800 focus:outline-none md:mr-2  "
          name="txtIdCategoria"
        >
          <option class="bg-slate-800 text-start uppercase text-white " value="0">Categoria</option>
          <?php while ($rowCat = $stmtCat->fetch(PDO::FETCH_BOTH)) {
              if ($cat == $rowCat[1]) {
                  $sel = "selected";
              } else {
                  $sel = "";
              }
              echo "
          <option class='bg-slate-800 text-start uppercase text-white' value='$rowCat[0]' $sel>$rowCat[1]</option>
          ";
          } ?>
        </select>
      </div>
    </div>

    <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center mr-[1.3rem]">
      <div class="md:w-1/3">
        <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right">
          Quant. do produto
        </label>
      </div>
      <div>
        <input class="rounded-none border-b-[1.7px] border-white bg-inherit py-2 px-[0.6rem] leading-tight text-white placeholder:text-gray-500 focus:border-blue-800 focus:outline-none md:mr-2"
        type="text" id="QntProduto" name="QntProduto" placeholder="Quantidade"
        value="<?php echo @$_GET["quantidade"]; ?>">
      </div>
    </div>

    <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center mr-[1.3rem]">
      <div class="md:w-1/3">
        <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right">
          Valor do produto
        </label>
      </div>
      <div>
        <input class="rounded-none border-b-[1.7px] border-white bg-inherit py-2 px-[0.6rem] leading-tight text-white placeholder:text-gray-500 focus:border-blue-800 focus:outline-none md:mr-2"
        type="text" id="txValor" name="txValor" placeholder="Valor (R$)" value=
        "<?php echo @$_GET["valor"]; ?>">
      </div>
    </div>

    <div class="md:flex md:items-center mb-5">
      <div class="md:w-1/3"></div>
      <div class="md:w-2/3">
        <button
          type="submit"
          class="focus:shadow-outline duration-50 rounded-sm bg-blue-800 py-2 px-20 font-bold text-white shadow transition-all ease-linear hover:rounded-lg hover:bg-blue-900 focus:outline-none"
        >
          Salvar
        </button>
      </div>
    </div>
  </form>
</div>

<div class="flex flex-col mt-28 items-center">
  <?php
  $stmt = $pdo->prepare("select
  p.idProduto,p.produto,c.categoria,p.valor,p.quantidade from tbproduto p inner
  join tbcategoria c on p.idCategoria = c.idCategoria");
  $stmt->execute();
  ?>
<div class="mx-20 flex h-14 items-center uppercase bg-slate-800 px-5 font-bold shadow-sm  bg-opacity-90  rounded drop-shadow-lg">
    <h1 class="text-xl text-white">Lista de produtos</h1>
  </div>  

  <div
    class="py-5 px-5 flex h-fit  flex-col items-center mt-5   bg-slate-900  bg-opacity-30  rounded drop-shadow-lg text-start">
   
    
    <table class="text-white  w-full h-full bg-gray-900 bg-opacity-50  rounded drop-shadow-xl">
      <thead class="border-b-2 bg-neutral-900 bg-opacity-30  rounded drop-shadow-lg">
        <tr>
          <th class="py-1 pl-10 text-lg font-medium text-white uppercase">Produto</th>
          <th class="py-1 pl-10  text-lg font-medium text-white uppercase">Categoria</th>
          <th class="py-1 pl-10  text-lg font-medium text-white uppercase">Valor</th>
          <th class="py-1 pl-10  text-lg font-medium text-white uppercase">Quantidade</th>
          <th class="py-1 pl-10  text-lg font-medium text-white uppercase">‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎</th>
          <th class="py-1 pl-10  text-lg font-medium text-white uppercase">&nbsp;</th>
        </tr>
      </thead>

      <?php while ($row = $stmt->fetch(Pdo::FETCH_BOTH)) {
          echo "
      <tr>
        ";
          echo "
        <td class='py-2 pl-11  px-2 border-b-[0.5px] font-light'>$row[produto]</td>
        ";
          echo "
        <td class='py-2 pl-11  px-2 border-b-[0.5px] font-light'>$row[categoria]</td>
        ";
          echo "
        <td class='py-2  pl-11 px-2 border-b-[0.5px] font-light'>$row[valor]</td>
        ";
          echo "
        <td class='py-2 pl-11  px-2 border-b-[0.5px] font-light'>$row[quantidade]</td>
        ";
          echo "
        <td class='py-2 pl-11  px-2 border-b-[0.5px] font-light'>
          ";
          echo "<a href='produto-excluir.php?id=$row[idProduto]'> Excluir </a
          >";
          echo "
        </td>
        ";
          echo "
        <td class='py-2 pl-11  px-2 border-b-[0.5px] font-light'>
          ";
          echo "<a
            href='?idProduto=$row[0]&produto=$row[1]&categoria=$row[2]&valor=$row[3]&quantidade=$row[4]'
          >
            Editar </a
          >";
          echo "
        </td>
        ";
          echo "
      </tr>
      ";
      } ?>
    </table>
  </div>
  </div>
</div>
  <?php include_once "../layout/rodape.html"; ?>
</div>

<div>
<a href="./pdf-produtos.php" class="mr-11 w-3/4 self-center  bg-blue-900 py-1 text-center text-2xl text-white hover:bg-blue-800 transition-all">Exibir como pdf</a>
</div>