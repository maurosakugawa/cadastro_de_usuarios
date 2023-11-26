<?php
$servername = 'localhost';
$database = '<database-name>';
$username = '<database-username>';
$password = '<database-password>';

$conexao = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conexao, "utf8");

// Verificando o sucesso na conexão.
if (!$conexao) {
    die("A conexão com o banco de dados falhou: " . mysqli_connect_error());
} else {
    // echo "Conexão bem-sucedida!";
}
?>