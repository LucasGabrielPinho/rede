<?php session_start();
$default = "../src/img/default.png";
include "../querys/banco.php";
$sql2 = "select * from tb_jogos";
$resultado2 = mysqli_query($conexao, $sql2);
if (!empty($_GET['msg'])) {
    echo $_GET['msg'];
}
if (empty($_SESSION['codigoUsuario']))
{
    header("Location: acesso.php");    
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/css/main.css">
    <title>TNG - Login</title>
</head>

<body class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Rede Social</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="principal.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../querys/sair.php">Sair</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="col-md-12 border pt-3 rounded">
                    <div class="card">
                        <img class="card-img-top" src="
                            <?php
                            if ($_SESSION['avatarUsuario'] == $default) {
                                echo $default;
                            } else {
                                echo "../src/img/avatar/" . $_SESSION['avatarUsuario'];
                            }


                            ?>" alt="Imagem de capa do card">
                        <div class="card-body text-center">
                            <label class="card-text"><?php echo $_SESSION['nomeUsuario'] ?></label>
                        </div>
                    </div>
                    <nav class="nav flex-column">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Editar Perfil</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 px-0">
                <div class="row">
                    <form class="" action="../querys/criarPostagem.php" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="col-md-12 bg-secondary rounded py-2">
                                <div class="form-group">
                                    <textarea class="form-control my-3" name="fTextoPost" id="fTextoPost" rows="1" placeholder="Compartilhe algo"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="custom-file">
                                            <input type="file" id="fImgPost" name="fImgPost" class="custom-file-input">
                                            <label class="custom-file-label" for="customFile">Imagem</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <select name="fJogoPost" class="form-control" id="fJogoPost">
                                                <option disabled selected>Selecione o Jogo...</option>
                                                <?php foreach ($resultado2 as $jogo) { ?>
                                                    <option value="<?php echo $jogo['jogCodigo']; ?>" 4>
                                                        <?php echo $jogo['jogNome']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-success btn-block">Publicar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                $sqlPost = "SELECT * FROM tb_postagens INNER JOIN tb_usuarios INNER JOIN tb_jogos WHERE tb_postagens.FK_usuCodigo = tb_usuarios.usuCodigo and tb_postagens.FK_jogCodigo = tb_jogos.jogCodigo order by tb_postagens.postCodigo DESC";
                $resultadoPost = mysqli_query($conexao, $sqlPost);
                ?>

                <?php foreach ($resultadoPost as $postagem) { ?>

                    <div class="col-md-12 px-0">
                        <div class="card p-3 border my-3">
                            <div class="card-body">
                                <img class="rounded-circle" src="
                                    <?php
                                    if ($postagem['usuAvatar'] == $default) {
                                        echo $default;
                                    } else {
                                        echo "../src/img/avatar/" . $postagem['usuAvatar'];
                                    }
                                    ?>
                                " alt="" width="40" height="40">

                                <label><?php echo $postagem['usuNome'] ?></label>
                                <label>- está jogando - <?php echo $postagem['jogNome'] ?></label>
                                <p class="card-text mt-3"><?php echo $postagem['postConteudo'] ?></p>
                            </div>
                            <img class="card-img-bottom" src="<?php echo '../src/img/postagem/' . $postagem['postImg'] ?>" alt="Imagem de capa do card">
                            <form class="form-group my-1" action="../querys/criarComentario.php" method="POST">
                                <a href="javascript:void(0);" class="btn btn-primary btn-sm text-light">Like</a>
                                <br>
                                <input id="fPostComent" name="fPostComent" class="d-none" type="text" value="<?php echo $postagem['postCodigo']; ?>">
                                <textarea class="form-control my-1" name="fComentario" id="fComentario" rows="1" placeholder="Deixe seu comentário"></textarea>
                                <label for="">Comentários</label>
                                <button class="btn btn-success btn-sm float-right" for="fComentario" type="submit">Enviar</button>
                            </form>
                            <?php
                            $sqlComent = "SELECT tb_usuarios.usuNome, tb_usuarios.usuAvatar, tb_comentarios.comentario, tb_postagens.postCodigo FROM tb_comentarios INNER JOIN tb_postagens INNER JOIN tb_usuarios WHERE tb_comentarios.FK_postCodigo = tb_postagens.postCodigo AND tb_comentarios.FK_usuCodigo=tb_usuarios.usuCodigo";
                            $resultadoComent = mysqli_query($conexao, $sqlComent);
                            ?>
                            <?php foreach ($resultadoComent as $comentario) { ?>
                                <?php if ($comentario['postCodigo'] == $postagem['postCodigo']) { ?>
                                    <div class="border mt-2">
                                        <img class="rounded-circle m-2" src="
                                            <?php
                                            if ($comentario['usuAvatar'] == $default) {
                                                echo $default;
                                            } else {
                                                echo "../src/img/avatar/" . $comentario['usuAvatar'];
                                            }
                                            ?>
                                        " alt="" width="40" height="40">
                                        <label for=""><?php echo $comentario['usuNome']; ?></label>
                                        <div class="col-md-12" style="border-top: 1px solid #99999955;">
                                            <label for=""><?php echo $comentario['comentario']; ?></label>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-3">
                <div class="col-md-12 border rounded">
                    <h5 class=" pt-3">Sugestões para seguir...</h5>
                    <hr>
                    <nav class="nav flex-column">
                        <div class="col-md-12 p-0">
                            <img class="float-left rounded-circle" src="../src/img/User.PNG" alt="" width="40" height="40">
                            <button class="btn btn-success float-right btn-sm">Seguir</button>
                            <label for="" class="text-success">Yoda</label><br>
                            <label class="" style="font-size:12px;" for="">Segue você</label>
                            <hr>
                        </div>
                        <div class="col-md-12 p-0">
                            <img class="float-left rounded-circle" src="../src/img/User.PNG" alt="" width="40" height="40">
                            <button class="btn btn-success float-right btn-sm">Seguir</button>
                            <label for="" class="text-success">Jukes</label><br>
                            <label class="" style="font-size:12px;" for="">Segue League Of Legends</label>
                            <hr>
                        </div>
                        <div class="col-md-12 p-0">
                            <img class="float-left rounded-circle" src="../src/img/User.PNG" alt="" width="40" height="40">
                            <button class="btn btn-success float-right btn-sm">Seguir</button>
                            <label for="" class="text-success">Fallen</label><br>
                            <label class="" style="font-size:12px;" for="">Seguido por Lucas Pinho</label>
                            <hr>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../querys/editarUsuario.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome</label>
                            <input type="text" class="form-control" id="fNome" name="fNome" value="<?php echo $_SESSION['nomeUsuario'] ?>">

                            <label for="message-text" class="col-form-label">Senha</label>
                            <input type="password" class="form-control" id="fSenha" name="fSenha">

                            <label for="message-text" class="col-form-label">Avatar</label>
                            <input type="file" class="form-control" id="fAvatar" name="fAvatar">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Alterar</button>
                    </div>
                </form>
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