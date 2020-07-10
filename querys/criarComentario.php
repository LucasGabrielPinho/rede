<?php
include "banco.php";
session_start();

$texto = $_POST['fComentario'];
$usuario = $_SESSION['codigoUsuario'];
$post = $_POST['fPostComent'];


if (!$texto == '') {
    $sql = "insert into tb_comentarios (comentario, FK_postCodigo, FK_usuCodigo) values ('$texto', $post, $usuario)";
    $resultado = mysqli_query($conexao, $sql);
    header("Location: ../dist/principal.php");
} else {
    $msg =  "<script>alert('Você precisa digitar algo!');</script>";
    header("Location: ../dist/principal.php?msg=$msg");
}
