
<?php include_once ('head.php'); ?>

<title>Gerenciamento de Usuários</title>

<body id="fundo-azul">
    <div class="mt-5"><h3 class="text-center">Gerenciamento de Usuários</h3></div>
    <div class="container px-3 mt-5">
        
        <div class="row px-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-plus-circle"></i> Adicionar Usuários</h5>
                        <p class="card-text">Cadastre novos usuários.</p>
                        <a href="cadastrar_usuario.php" class="btn btn-primary">Cadastrar usuário</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-newspaper"></i> Lista de Usuários</h5>
                        <p class="card-text">Visualizar, editar ou excluir os usuários.</p>
                        <a href="listar_usuarios.php" class="btn btn-primary">Ver usuários</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>