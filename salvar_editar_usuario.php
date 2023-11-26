<?php
include_once ('conexao.php');
include_once('head.php');
?>
<body id="fundo-azul">
    <div class="container px-3 mt-5 text-center">
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id_usuario'];
        $txt_nome = $_POST['nome'];
        $txt_sobrenome = $_POST['sobrenome'];
        $txt_email = $_POST['email'];
        $txt_cargo = $_POST['cargo'];

        // Evitar SQL injection utilizando prepared statements
        $stmt = $conexao->prepare("UPDATE usuario SET nome = ?, sobrenome = ?, email = ?, nivel_usuario = ? WHERE id_usuario = ?");
        $stmt->bind_param("ssssi", $txt_nome, $txt_sobrenome, $txt_email, $txt_cargo, $id);

        if ($stmt->execute()) {
            echo "<h3 class='green-tittle'>Usuário atualizado com sucesso.</h3>";
            ?>
            <div class="container">
                <div class="d-flex justify-content-center my-5">
                    <a href="index.php" class="btn btn-sm  btn-primary">Voltar à página inicial</a>
                    <div class="mx-4"></div>
                    <a href="editar_usuario.php?id=<?=$id?>" class="btn btn-sm  btn-warning">Editar novamente</a>
                </div>
                
            </div>

       <?php } else {
            echo "Erro ao atualizar o usuário: " . $stmt->error;
        }

        $stmt->close();
        $conexao->close();
    } else {
        echo "Método de requisição inválido.";
    }
?>

</body>

</html>
