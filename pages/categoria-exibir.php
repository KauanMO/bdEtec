<?php include "../layout/cabecalho.html"; 
include "../layout/navPosLogin.html";
include "conexao.php"; 
include_once "sentinela.php";
?>


<div class="flex justify-evenly">

<div class="flex flex-col mt-28 items-center">

<div class="mx-20 flex h-14 items-center uppercase bg-slate-800 px-5 font-bold shadow-sm  bg-opacity-80 backdrop-blur-lg rounded drop-shadow-lg">
    <h1 class="text-xl text-white">Registre uma categoria</h1>
  </div>
  <form
    method="post"
    action="categoria-salvar.php"
    class="py-5 px-5 flex h-fit w-96 flex-col items-center justify-center bg-slate-900 shadow-2xl transition-all md:mb-[4.5rem] rounded-sm my-5  bg-opacity-90 backdrop-blur-lg  drop-shadow-lg"
  >
    <div>
      <input type="hidden" placeholder="idCategoria" name="txIdCategoria"
      value="<?php echo @$_GET["idCategoria"]; ?>"/>
    </div>

    <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center">
      <div class="md:w-1/3">
        <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right">
          Nome da categoria
        </label>
      </div>
        <input class="rounded-none border-b-[1.7px] border-white bg-inherit py-2 px-2 leading-tight text-white placeholder:text-gray-500 focus:border-blue-800 focus:outline-none md:mr-2"
        type="text" id="txCategoria" name="txCategoria" placeholder="Categoria"
        value="<?php echo @$_GET["categoria"]; ?>"/>    
   </div>
    
   <div class="mb-5 pb-3 md:flex md:items-center">
  <button type="submit" class="mx-2 rounded-sm border-b bg-slate-100 bg-opacity-[0.01] border-white border-opacity-10 px-20 py-2 text-xl font-medium text-gray-200 transition-all hover:border-b-[1px] hover:border-opacity-100 hover:bg-slate-500 hover:bg-opacity-10">Salvar</button>
  </div>
  </form>

  <img class="mr-8 w-52 -mt-10" src="/bdetec/img/totodile-3420943178.gif" />

</div>

<div class="flex flex-col mt-28 items-center">
  <?php
  $pdo = Conexao::conectar();
  $stmt = $pdo->prepare("select idCategoria, categoria from tbcategoria");
  $stmt->execute();
  ?>
<div class="mx-20 flex h-14 items-center uppercase bg-slate-800 px-5 font-bold shadow-sm  bg-opacity-90 backdrop-blur-lg rounded drop-shadow-lg">
    <h1 class="text-xl text-white">Lista de categorias</h1>
  </div>

  <div
    class="py-5 px-5 flex h-fit w-96 flex-col items-center mt-5   bg-slate-900  bg-opacity-30 backdrop-blur-lg rounded drop-shadow-lg text-start"
>
    <table class="text-white  w-full h-full bg-gray-900 bg-opacity-30 backdrop-blur-lg rounded drop-shadow-xl">
      <thead class="border-b-2 bg-neutral-900 bg-opacity-30  rounded drop-shadow-lg">
        <tr>
          <th class="py-1 pl-10 text-lg font-medium text-white uppercase">Categoria</th>
          <th class="py-1 pr-10 text-lg font-medium text-white">‎ ‎ ‎ ‎ ‎</th>
          <th class="py-1 pr-10 text-lg font-medium text-white">&nbsp;</th>
        </tr>
      </thead>

      <?php while ($row = $stmt->fetch(Pdo::FETCH_BOTH)) {
          echo "
      <tr>
        ";
          echo "
        <td class='py-2 px-2 pl-11 border-b-[0.5px] font-light'>$row[categoria]</td>
        ";
          echo "
        <td class='py-2 px-2 pl-11 border-b-[0.5px]'>
          ";
          echo "<a href='categoria-excluir.php?id=$row[idCategoria]'>
            Excluir </a
          >";
          echo "
        </td>
        ";
          echo "
        <td class='py-2 px-2 pl-11 border-b-[0.5px]'>
          ";
          echo "<a href='?idCategoria=$row[0]&categoria=$row[1]'> Editar </a
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
  <?php include_once "../layout/rodape.html"; ?>
</div>
</div>

</div>

<div>
  <a href="./pdf-categorias.php" class="mr-11 w-3/4 self-center  bg-blue-900 py-1 text-center text-2xl text-white hover:bg-blue-800 transition-all">Exibir como pdf</a>
</div>