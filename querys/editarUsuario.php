<?php
session_start();
include "banco.php";

$nome     = $_POST['fNome'];
$senha     = $_POST['fSenha'];
$alert = "danger";


if (!$nome == '') {
    $sql = "update tb_usuarios set usuNome='$nome' where usuEmail = '" . $_SESSION['emailUsuario'] . "'";
    $resultado = mysqli_query($conexao, $sql);
    $_SESSION['nomeUsuario'] = $nome;

    if (!$senha == '') {
        $sql = "update tb_usuarios set usuSenha='$senha' where usuEmail = '" . $_SESSION['emailUsuario'] . "'";
        $resultado = mysqli_query($conexao, $sql);
    }

    $tamanho = $_FILES['fAvatar']['size'];
    if ($tamanho > 0) {
        $arquivoNome = basename($_FILES['fAvatar']['name']);
        $pastaDestino = "D:/xampp/htdocs/rede_social/rede/src/img/avatar/";
        $arquivoDestino = $pastaDestino . $arquivoNome;
        move_uploaded_file($_FILES['fAvatar']['tmp_name'], $arquivoDestino);
        $sql = "update tb_usuarios set usuAvatar='$arquivoNome' where usuEmail = '" . $_SESSION['emailUsuario'] . "'";
        $resultado = mysqli_query($conexao, $sql);
        $_SESSION['avatarUsuario'] = $arquivoNome;
    }

    $alert = "success";
    $msg = "Usuario editado com sucesso!";
} else {
    $msg = "Preencha corretamente os campos";
}

header("Location: ../dist/principal.php");
