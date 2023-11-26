<!--nav class="nav nav-pills nav-fill m-3">
  <a class="nav-item nav-link" href="index.php" id="menu">Início</a>
  <a id="cadastrar-menu" class="nav-item nav-link" href="cadastrar_produto.php">Novo Produto</a>
  <a id="menu1" class="nav-item nav-link" href="listar_usuarios.php">Listar Usuários</a>
  <a id="menu2" class="nav-item nav-link" href="cadastrar_usuario.php">Novo Usuário</a>
  <a id="listar-menu" class="nav-item nav-link" href="aprovar_usuario.php">Listar Usuário</a>
</nav -->

<nav class="nav nav-pills nav-fill m-3">
  <a class="nav-item nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>" href="index.php" id="menu">Início</a>
  
  <?php if(basename($_SERVER['PHP_SELF']) != 'listar_usuarios.php'): ?>
    <a id="menu1" class="nav-item nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'listar_usuarios.php') echo 'active'; ?>" href="listar_usuarios.php">Listar Usuários</a>
  <?php endif; ?>

  <?php if(basename($_SERVER['PHP_SELF']) != 'cadastrar_usuario.php'): ?>
    <a id="menu2" class="nav-item nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'cadastrar_usuario.php') echo 'active'; ?>" href="cadastrar_usuario.php">Novo Usuário</a>
  <?php endif; ?>
</nav>
