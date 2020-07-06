<?php
include "banco.php";

$nome     = $_POST['fNome'];
$email   = $_POST['fEmail'];
$senha     = $_POST['fSenha'];
$confSenha    = $_POST['fConfSenha'];
$alert = "danger";
$avatar = "../src/img/default.png";

if ($senha == $confSenha) {
    $sql = "select * from tb_usuarios where usuEmail ='" . $email . "'";
    $resultado = mysqli_query($conexao, $sql);

    $qtdLinhas = mysqli_num_rows($resultado);

    if ($qtdLinhas == 0) {
        $sql = "insert into tb_usuarios (usuNome, usuEmail, usuSenha, usuAvatar) values ('$nome','$email','$senha', '$avatar')";
        $resultado = mysqli_query($conexao, $sql);
        $alert = "success";
        $msg = "Usuario cadastrado com sucesso!";
    } else {
        $msg = "Esse e-mail já está cadastrado";
    }
} else {
    $msg = "As senhas devem ser iguais";
}

header("Location: ../dist/cadastro.php?msg=$msg&alert=$alert");
