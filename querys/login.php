<?php
    session_start();
    include "banco.php";

    $usu = $_POST['fEmail'];
    $sen = $_POST['fSenha'];

    $sql = "select * from tb_usuarios where usuEmail ='".$usu."' and usuSenha='".$sen."'";
    $resultado = mysqli_query($conexao, $sql);

    $qtdLinhas = mysqli_num_rows ($resultado);

    if ($qtdLinhas == 1)
    {
        $usuario = mysqli_fetch_array($resultado);
        $_SESSION['codigoUsuario'] = $usuario['usuCodigo'];
        $_SESSION['nomeUsuario'] = $usuario['usuNome'];
        $_SESSION['emailUsuario'] = $usuario['usuEmail'];
        $_SESSION['avatarUsuario'] = $usuario['usuAvatar'];
        header("Location: ../dist/principal.php");
    }
    else
    {
        header("Location: ../dist/acesso.php?msg=erro");
    }
?>

