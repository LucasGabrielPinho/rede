<?php
session_start();
if (!empty($_SESSION['codigoUsuario']))
{
    header("Location: acesso.php");    
}
?>

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
    <form class="form-signin" action="../querys/cadastroUsuario.php" method="POST">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Fazer cadastro</h1>
        <input type="text" class="form-control mb-1" placeholder="Digite seu nome" required autofocus id="fNome" name="fNome">
        <input type="email" class="form-control mb-1" placeholder="Digite seu email" required autofocus id="fEmail" name="fEmail">
        <input type="password" class="form-control mb-1" placeholder="Digite sua senha" required id="fSenha" name="fSenha">
        <input type="password" class="form-control" placeholder="Confirme a sua senha" required id="fConfSenha" name="fConfSenha">
        <button class="btn btn-lg btn-success btn-block mb-3" type="submit" id="bEntrar" name="bEntrar">Cadastrar</button>

        <?php
        if (!empty($_GET['msg'])) {
        ?>
            <div class="alert alert-<?php echo $_GET['alert'] ?>" role="alert"><?php echo $_GET['msg'] ?></div>
        <?php } ?>

        <div class="checkbox">
            <label>
                <a href="acesso.php" id="aAcesso" name="aAcesso">Fazer Login</a>
            </label>
        </div>
        <p class="mt-5 mb-3 text-muted">TNG &copy; 2020</p>
    </form>
</body>


<!-- Optional JavaScript -->
<script src="../src/js/jquery-3.5.1.slim.min.js"></script>
<script src="../src/js/popper.min.js"></script>
<script src="../src/js/bootstrap.min.js"></script>
</body>

</html>