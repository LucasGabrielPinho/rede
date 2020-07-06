<!doctype html>
<html lang="pr-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/css/main.css">
    <title>TNG - Login</title>
</head>

<body class="text-center body-login">
    <form class="form-signin" action="../querys/login.php" method="POST">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Acesse sua conta</h1>
        <input type="email" class="form-control mb-1" placeholder="Digite seu email" required autofocus id="fEmail" name="fEmail">
        <input type="password" class="form-control" placeholder="Digite sua senha" required id="fSenha" name="fSenha">
        <button class="btn btn-lg btn-success btn-block  mb-3" type="submit" id="bEntrar" name="bEntrar">Entrar</button>

        <?php
        if (!empty($_GET['msg'])) {
        ?>
            <div class="alert alert-danger" role="alert">Usuario ou senha incorretos</div>
        <?php } ?>



        <div class="checkbox">
            <label>
                <a href="javascript:void(0)" id="aCadastro" name="aCadastro" class="mr-3" data-toggle="modal" data-target="#exampleModal">Esqueceu sua senha?</a>
                <a href="cadastro.php" id="aCadastro" name="aCadastro" class="ml-5">Cadastre-se</a>
            </label>
        </div>
        <p class="mt-5 mb-3 text-muted">TNG &copy; 2020</p>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recuperar senha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Digite o email que deseja recupear a senha</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o email">
                        <small id="emailHelp" class="form-text text-muted">Ao confirmar será enviado um email para realizar a recuperação da sua senha :)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </div>
    </div>

</body>


<!-- Optional JavaScript -->
<script src="../src/js/jquery-3.5.1.slim.min.js"></script>
<script src="../src/js/popper.min.js"></script>
<script src="../src/js/bootstrap.min.js"></script>
</body>

</html>