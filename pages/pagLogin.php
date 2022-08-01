<?php include_once "../layout/cabecalho.html";
include_once "../layout/navPreLogin.html";?>
<div class="flex h-[50rem] items-center justify-center">
  <form method="post" action="verifica-login.php">
    <div class="mt-4 mr-6 flex items-center justify-center">
      <a href="../index.php">
      <img class="ml-4 transition-all hover:rotate-180 hover:hue-rotate-180" src="../img/totodile-3420943178.gif" />
      </a>
    </div>

    <div class=" py-5 px-5 flex h-fit w-96 flex-col items-center justify-center bg-slate-900 shadow-xl transition-all md:mb-[4.5rem] rounded-sm">

      <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center">
        <div class="md:w-1/3">
          <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right">Usuario</label>
        </div>
        <input class="rounded-none border-b-[1.7px] border-white bg-inherit py-2 px-2 leading-tight text-white placeholder:text-gray-500 focus:border-blue-800 focus:outline-none md:mr-2" type="text" id="txUsuario" name="txUsuario" placeholder="Nome de usuario" />
      </div>

      <div class="mb-6 mt-5 items-center justify-center md:flex md:items-center">
        <div class="md:w-1/3">
          <label class="mb-6 block pr-6 text-white md:mb-0 md:text-right">Senha</label>
        </div>
        <input class="rounded-none border-b-[1.7px] border-white bg-inherit py-2 px-2 leading-tight text-white placeholder:text-gray-500 focus:border-blue-800 focus:outline-none" type="password" id="txSenha" name="txSenha" placeholder="Senha" />
      </div>
      <?php if (isset($_COOKIE["login-errado"])) { ?>
      <i class="fa-solid fa-triangle-exclamation"></i>
      <font color="red">Usuário ou senha incorretos</font>
      <?php } ?>

      <div class="mb-5 text-blue-500">
        <a href="#" class="mr-1 underline text-xs">Esqueceu a senha?</a>
        <a href="pagCadastro.php" class="text-xs underline">Não tem uma conta?</a>
      </div>

      <div class="mb-5 pb-3 md:flex md:items-center">
      <button type="submit" class="mx-2 px-20 rounded-sm border-b bg-slate-100 bg-opacity-[0.01] border-white border-opacity-10 py-2 text-xl font-medium text-gray-200 transition-all hover:border-b-[1px] hover:border-opacity-100 hover:bg-slate-500 hover:bg-opacity-10">Conectar-se</button>
      </div>
    </div>
  </form>
</div>
