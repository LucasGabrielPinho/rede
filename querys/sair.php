<?php
session_start();
$_SESSION['codigoUsuario'] = '';
$_SESSION['nomeUsuario'] = '';
$_SESSION['emailUsuario'] = '';
$_SESSION['avatarUsuario'] = '';
header("Location: ../dist/acesso.php");