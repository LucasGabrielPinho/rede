<?php
$sqlComent = "SELECT tb_usuarios.usuNome, tb_usuarios.usuAvatar, tb_comentarios.comentario, tb_postagens.postCodigo FROM tb_comentarios INNER JOIN tb_postagens INNER JOIN tb_usuarios WHERE tb_comentarios.FK_postCodigo = tb_postagens.postCodigo AND tb_comentarios.FK_usuCodigo=tb_usuarios.usuCodigo";
$resultadoComent = mysqli_query($conexao, $sqlComent);
?>
<?php foreach ($resultadoComent as $comentario) { ?>
    <?php if ($comentario['postCodigo'] == $postagem['postCodigo']) { ?>
        <div class="border mt-2">
            <img class="rounded-circle m-2" src="../src/img/avatar/<?php echo $comentario['usuAvatar'] ?>" alt="" width="40" height="40">
            <label for=""><?php echo $comentario['usuNome']; ?></label>
            <div class="col-md-12" style="border-top: 1px solid #99999955;">
                <label for=""><?php echo $comentario['comentario']; ?></label>
            </div>
        </div>
<?php }
} ?>