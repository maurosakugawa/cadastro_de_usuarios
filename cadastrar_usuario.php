
<?php include_once ('head.php'); ?>

<title>Cadastro de usuário</title>

<body id="fundo-azul">
<?php include_once 'menu.php';?>
    <div class="container px-3 mx-auto my-5 col-8">
        <form action="inserir_usuario.php" method="POST" accept-charset="UTF-8">
            <h4 class="border-bottom pb-2 mb-3 text-center green-tittle">Cadastro de usuário</h4>
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome" placeholder="Digite o seu nome"
                    autocomplete="off" />
            </div>

            <div class="form-group">
                <label>Sobrenome</label>
                <input class="form-control" type="text" name="sobrenome" placeholder="Digite o seu sobrenome" />
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input class="form-control" type="email" name="email"
                    placeholder="Digite o seu e-mail para acessar o sistema" />
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input class="form-control" type="password" id="senha" name="senha" placeholder="Digite uma senha" />
            </div>

            <div class="form-group">
                <label>Repetir senha</label>
                <input class="form-control" type="password" id="senha2" name="senha2"
                    placeholder="Digite sua senha novamente" oninput="validaSenha(this)" />
                <small style="display:none" id="msg-erro">A senha precisa ser igual a senha digitada acima.</small>
            </div>

            <div class="form-group">
                <label>Nível de acesso</label>
                <select class="form-control" name="cargo">
                    <option value="1">Administrador</option>
                    <option value="2">Funcionário</option>
                </select>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-success btn_sm mt-3">Cadastrar</button>
            </div>
        </form>
    </div>

    <script>
    function validaSenha(input) {
        if (input.value != document.getElementById('senha').value) {
            input.setCustomValidity('Repita a senha corretamente!');
            document.getElementById('msg-erro').style.display = "block"
        } else {
            input.setCustomValidity('');
            document.getElementById('msg-erro').style.display = "none"
        }
    }
    </script>
</body>

</html>
    
    