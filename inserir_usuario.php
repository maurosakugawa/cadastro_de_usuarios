<?php
include_once ('conexao.php');
include_once ('head.php');

$txt_nome = mysqli_real_escape_string($conexao, trim($_POST["nome"]));
$txt_sobrenome = mysqli_real_escape_string($conexao, trim($_POST["sobrenome"]));
$txt_email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$txt_senha = mysqli_real_escape_string($conexao, trim($_POST["senha"]));
$senha_criptografada = sha1($txt_senha);
$txt_cargo = mysqli_real_escape_string($conexao, trim($_POST["cargo"]));

// Verifica se o e-mail já está cadastrado
$sql_verifica_email = "SELECT * FROM usuario WHERE email = ?";
$stmt_verifica_email = mysqli_prepare($conexao, $sql_verifica_email);
mysqli_stmt_bind_param($stmt_verifica_email, "s", $txt_email);
mysqli_stmt_execute($stmt_verifica_email);
$result_verifica_email = mysqli_stmt_get_result($stmt_verifica_email);
?>
<body id="fundo-azul">
    <div class="container wid-700 p-2 text-center mt-5">
<?php
if (mysqli_num_rows($result_verifica_email) > 0) {
    // E-mail já cadastrado, exiba uma mensagem ou redirecione para evitar o cadastro duplicado
    echo "O e-mail já está em uso. Escolha outro e-mail. <br>";
    echo "<a class='btn btn-sm btn-primary' role='button' href='cadastrar_usuario.php'>Voltar</a>";
} else {
    // E-mail não cadastrado, proceda com a inserção 
    $sql = "INSERT INTO `usuario` (`nome`, `sobrenome`, `email`, `senha`, `nivel_usuario`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "ssssi", $txt_nome, $txt_sobrenome, $txt_email, $senha_criptografada, $txt_cargo);

    // Execute a consulta
    $inserir = mysqli_stmt_execute($stmt);
    
    if ($inserir) {
?>


        <h4 class="mt-5">Usuário <b><?=$txt_nome .' '.$txt_sobrenome?></b> Cadastrado com sucesso!</h4>
        <div class="d-flex justify-content-center my-5">
            <a class="btn btn-sm btn-primary" role="button" href="cadastrar_usuario.php">Cadastrar novo usuário</a>
            <div class="mx-4"></div>
            <a class="btn btn-sm btn-primary" role="button" href="listar_usuarios.php">Listar usuários</a>
        </div>
    
    </div>
    <?php } else { 
                // Falha no cadastro
        echo "Falha ao cadastrar o usuário." . mysqli_error($conexao);
    }
}
?>
</body>
</html>