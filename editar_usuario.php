<?php
    include_once ('conexao.php');
    include_once ('head.php'); 
?>

<?php $id = isset($_GET['id']) ? intval($_GET['id']) : 0; ?>
<body  id="fundo-azul">
    <?php include_once('menu.php');?>
<div class="container px-3 mt-5">
    <h4 class="pb-3 mb-4 text-center green-tittle">
        Formulário de Edição de Usuário
    </h4>
    <form action="salvar_editar_usuario.php" method="POST">
        <?php
            if ($id > 0) {
                $stmt = mysqli_prepare($conexao, "SELECT * FROM usuario WHERE id_usuario = ?");
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);

                $resultado = mysqli_stmt_get_result($stmt);

                while ($array = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                    $txt_id = $array['id_usuario'];
                    $txt_nome = $array['nome'];
                    $txt_sobrenome = $array['sobrenome'];
                    $txt_email = $array['email'];
                    $txt_cargo = $array['nivel_usuario'];                
        ?>
        <input style="display: none" id="id_usuario" name="id_usuario" value="<?=$txt_id?>">
        <input type="hidden" id="nivel_usuario_original" name="nivel_usuario_original" value="<?=$txt_cargo?>">

        <div class="row">
            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required autocomplete="off"
                    value="<?=$txt_nome?>">
            </div>

            <div class="form-group col-md-6">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" required autocomplete="off"
                    value="<?=$txt_sobrenome?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" required autocomplete="off"
                    value="<?=$txt_email?>">
            </div>

            <div class="form-group col-md-6">
                <label>Nível de acesso</label>
                <select class="form-control" name="cargo">
                    <option value="1" <?php if ($txt_cargo == 1) echo 'selected'; ?>>Administrador</option>
                    <option value="2" <?php if ($txt_cargo == 2) echo 'selected'; ?>>Funcionário</option>
                </select>
            </div>
        </div>
        <?php 
            }
            mysqli_stmt_close($stmt);
        ?>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn-enviar btn btn-success btn-sm btn-block mt-3">Confirmar</button>
        </div>
        
    </form>
    <?php } else { ?>
        header('Location: listar_usuarios.php');
        exit;
    <?php } ?>
</div>

</body>
</html>
