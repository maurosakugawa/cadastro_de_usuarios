
<?php
include_once ('conexao.php');
include_once ('head.php');

$id = $_GET['id'];

// Obtém os dados do usuário
$sql = "SELECT * FROM usuario WHERE id_usuario = $id";
$resultado = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_array($resultado);
?>
<body id="fundo-azul">
    <div class="container mt-5 wid-700">
        <h3 class="text-center green-tittle">
            Deseja realmente excluir o usuário <br><b><?= $usuario['nome'] ." " .$usuario['sobrenome'];?></b>?
        </h3>
        <!-- Button trigger modal -->
        <div class="d-flex justify-content-center my-5">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExcluirUsuario" onclick="location.href='listar_usuarios.php'">CANCELAR</button>
            <div class="mx-4"></div>
            <button type="button" class="btn btn-primary" id="deleteButton">EXCLUIR</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalExcluirUsuario">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Modal title
                        </h5>
                        <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Mostra a mensagem de sucesso ou falha ao excluir -->
                        <div id="message"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"  onclick="location.href='index.php'">
                            Voltar à Home
                        </button>
                        <button type="button" class="btn btn-primary" onclick="location.href='listar_usuarios.php'">
                            Listar usuários
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>





<script>
    $(document).ready(function() {
        $('#deleteButton').click(function() {
            // Faz uma solicitação AJAX para o servidor para excluir o registro do usuário
            $.ajax({
                url: 'excluir_usuario.php',
                method: 'POST',
                data: {
                    id: <?php echo $id; ?>
                },
                success: function(response) {
                    // Exibe a mensagem no modal
                    // $('#message').text(response.message);
                    $('#modalExcluirUsuario .modal-body').html('Usuário excluído com sucesso.');
                    // Abre o modal
                    $('#modalExcluirUsuario').modal('show');
                },
                error: function(error) {
                    console.error('Erro ao excluir o usuário:', error);
                }
            });
        });
    });

</script>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
    
        // Delete the user from the database
        $sql = "DELETE FROM usuario WHERE id_usuario = $id";
        $update = mysqli_query($conexao, $sql);
    
        if ($update) {
            // Exibe a mensagem de sucesso diretamente no JavaScript
            echo '<script>';
            echo '$(document).ready(function() {';
            echo '$("#modalExcluirUsuario .modal-body").html("Usuário excluído com sucesso.");';
            echo '$("#modalExcluirUsuario").modal("show");';
            echo '});';
            echo '</script>';
        } else {
            // Exibe a mensagem de erro diretamente no JavaScript
            echo '<script>';
            echo '$(document).ready(function() {';
            echo '$("#modalExcluirUsuario .modal-body").html("Falha ao excluir usuário.");';
            echo '$("#modalExcluirUsuario").modal("show");';
            echo '});';
            echo '</script>';
        }
    }
?>
