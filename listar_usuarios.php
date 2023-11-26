
<?php 
    include_once ('head.php');
    include_once ('conexao.php');
?>


<title>Lista de Usuários</title>
<body id="fundo-azul">
    <?php include_once 'menu.php';?>
    <div class="container p-3">
        <h3 class="mb-3 text-center green-tittle">Lista de Usuários</h3>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>

<?php

$sql = 'SELECT * FROM `usuario`';
$retorno = mysqli_query($conexao, $sql);
while ($array = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {

    $txt_id = $array['id_usuario'];
    $txt_nome = htmlentities($array['nome'], ENT_QUOTES, 'UTF-8');
    $txt_sobrenome = htmlentities($array['sobrenome'], ENT_QUOTES, 'UTF-8');
    $txt_email = htmlentities($array['email'], ENT_QUOTES, 'UTF-8');
    ?>
                <tr>
                    <td><?php echo $txt_id;?></td>
                    <td><?php echo $txt_nome;?></td>
                    <td><?php echo $txt_sobrenome;?></td>
                    <td><?php echo $txt_email;?></td>
                    <td>
                        <a class="btn-editar btn btn-sm btn-warning" href="editar_usuario.php?id=<?php echo $txt_id?>"
                            role="button">
                            <i class="far fa-edit"></i> Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn-editar btn btn-sm btn-danger" href="excluir_usuario.php?id=<?php echo $txt_id?>"
                            role="button">
                            <i class="far fa-trash-alt"></i> Excluir
                        </a>
                    </td>
                </tr>
        <?php
if (isset($_GET['atualizado'])) {
    echo '<div id="alerta" class="alert alert-success" role="alert">
                Produto <b>' . $_GET['atualizado'] . '</b> atualizado com sucesso!.
                </div>';
}
if (isset($_GET['excluido'])) {
    echo '<div id="alerta" class="alert alert-danger" role="alert">
                Produto <b>' . $_GET['excluido'] . '</b> excluido com sucesso!.
                </div>';
}
if (isset($_GET['cadastrado'])) {
    echo '<div id="alerta" class="alert alert-success" role="alert">
                Produto cadastrado com sucesso!.
                </div>';
}

?>
    </div>
<?php } ?>

            </tbody>
        </table>

</body>

</html>


