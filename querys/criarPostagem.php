<?php
include "banco.php";
session_start();

$texto = $_POST['fTextoPost'];
$jogo = $_POST['fJogoPost'];
$usuario = $_SESSION['codigoUsuario'];


if (!$texto == '') {
    if (!$jogo == '') {
        $tamanho = $_FILES['fImgPost']['size'];
        if ($tamanho > 0) {
            $arquivoNome = basename($_FILES['fImgPost']['name']);
            $pastaDestino = "D:/xampp/htdocs/rede_social/rede/src/img/postagem/";
            $arquivoDestino = $pastaDestino . $arquivoNome;
            move_uploaded_file($_FILES['fImgPost']['tmp_name'], $arquivoDestino);
            $sql = "insert into tb_postagens (postConteudo, postImg, FK_jogCodigo, FK_usuCodigo) values ('$texto', '$arquivoNome', $jogo, $usuario)";
            $resultado = mysqli_query($conexao, $sql);
            header("Location: ../dist/principal.php");
        }else {
            $msg =  "<script>alert('Preencha corretamente todos os campos!');</script>"; 
            header("Location: ../dist/principal.php?msg=$msg");
        }
    }else {
        $msg =  "<script>alert('Preencha corretamente todos os campos!');</script>"; 
        header("Location: ../dist/principal.php?msg=$msg");
    }
} else {
    $msg =  "<script>alert('Preencha corretamente todos os campos!');</script>"; 
    header("Location: ../dist/principal.php?msg=$msg");
}
