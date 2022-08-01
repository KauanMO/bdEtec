<?php include_once "../layout/cabecalho.html";
include_once "../layout/navPreLogin.html";?>
<div class="flex h-[50rem] items-center justify-center">
  <form method="post" action="usuario-salvar.php">
    <div class="-mt-14 mr-6 flex items-center justify-center">
      <a href="../index.php">
        <img class="ml-4 transition-all hover:rotate-180 hover:hue-rotate-180" src="../img/totodile-3420943178.gif" />
      </a>
    </div>
    <div class=" flex h-fit w-96 flex-col items-center justify-center bg-slate-900 py-4 px-5 shadow-xl transition-all">
      <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center">
        <div class="md:w-1/3">
          <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right">Usuario</label>
        </div>
        <input class="rounded-none border-b-2 border-white bg-inherit py-2 px-2 leading-tight text-white placeholder:text-gray-500 focus:border-blue-800 focus:outline-none md:mr-2" type="text" id="cadTxUsuario" name="cadTxUsuario" placeholder="Nome de usuario" />
      </div>

      <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center">
        <div class="md:w-1/3">
          <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right">Senha</label>
        </div>
        <input class="rounded-none border-b-2 border-white bg-inherit py-2 px-2 leading-tight text-white placeholder:text-gray-500 focus:border-blue-800 focus:outline-none" type="password" id="cadTxSenha" name="cadTxSenha" placeholder="Senha" />
      </div>

      <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center">
        <div class="md:w-1/3">
          <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right">Confirmar Senha</label>
        </div>
        <input class="rounded-none border-b-2 border-white bg-inherit py-2 px-2 leading-tight text-white placeholder:text-gray-500 focus:border-blue-800 focus:outline-none md:mr-[2.6rem]" type="password" id="cadTxConfirmSenha" name="cadTxConfirmSenha" placeholder="Confirmar senha" />
      </div>
      <div class="mb-4 -mt-2 text-blue-500">
        <a href="pagLogin.php" class="mr-1 text-xs underline">Ja tem uma conta?</a>
      </div>

      <?php if (isset($_COOKIE["senhas-diferentes"])) { ?>
      <i class="fa-solid fa-triangle-exclamation"></i>
      <font color="red">Senhas não coincindem</font>
      <?php } ?>

      <?php if (isset($_COOKIE["usuario-pequeno"])) { ?>
      <i class="fa-solid fa-triangle-exclamation"></i>
      <font color="red">Usuário muito pequeno. Mínimo de 4 caracteres</font>
      <?php } ?>

      <?php if (isset($_COOKIE["senha-pequena"])) { ?>
      <i class="fa-solid fa-triangle-exclamation"></i>
      <font color="red">Senha muita pequena. Mínimo de 6 caracteres</font>
      <?php } ?>

      <div class="mb-5 pb-3 md:flex md:items-center">
        <button type="submit" class="focus:shadow-outline duration-50 rounded-sm bg-blue-800 py-2 px-16 font-bold text-white shadow transition-all ease-linear hover:rounded-lg hover:bg-blue-900 focus:outline-none">Cadastrar</button>
      </div>
    </div>
  </form>
</div>
