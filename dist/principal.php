<?php session_start();
$default = "../src/img/default.png";
include "../querys/banco.php";
$sql2 = "select * from tb_jogos";
$resultado2 = mysqli_query($conexao, $sql2);
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

<body class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Container</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
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
                    <div class="col-md-12">
                        <div class="col-md-12 bg-secondary rounded py-2">
                            <div class="form-group">
                                <textarea class="form-control my-3" id="exampleFormControlTextarea1" rows="1" placeholder="Compartilhe algo"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label" for="customFile">Imagem</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1">
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
                </div>
                <?php
                $sqlPost = "SELECT * FROM tb_postagens INNER JOIN tb_usuarios WHERE tb_postagens.FK_usuCodigo = tb_usuarios.usuCodigo";
                $resultadoPost = mysqli_query($conexao, $sqlPost);
                ?>

                <?php foreach ($resultadoPost as $postagem) { ?>

                    <div class="col-md-12 px-0">
                        <div class="card p-3 border my-3">
                            <div class="card-body">
                                <p><?php echo $postagem['usuNome'] ?></p>
                                <p class="card-text"><?php echo $postagem['postConteudo'] ?></p>
                            </div>
                            <img class="card-img-bottom" src="<?php echo '../src/img/postagem/' . $postagem['postImg'] ?>" alt="Imagem de capa do card">
                            <div class="form-group my-1">
                                <button class="btn btn-primary btn-sm">Like</button>
                                <br>
                                <textarea class="form-control my-1" id="exampleFormControlTextarea" rows="1" placeholder="Deixe seu comentário"></textarea>
                                <label for="">Comentários</label>
                                <button class="btn btn-success btn-sm float-right" for="exampleFormControlTextarea">Enviar</button>
                            </div>
                            <div class="border">
                                <img src="../src/img/User.PNG" alt="" width="40" height="40">
                                <label for="">Nome do comentarista</label>
                                <hr>
                                <div class="col-md-12">
                                    <label for="">Esse avião é muito supimpa Esse avião é muito supimpa Esse avião é muito supimpa</label>
                                </div>
                            </div>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
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