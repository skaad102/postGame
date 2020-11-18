<?php
include '../assets/include/header_user.php';
include '../conexion/conection.php';
include '../assets/include/all-src.php';
?>

<div class="section section-signup" style="background-image: url('../assets/img/bg11.jpg'); background-size: cover; background-position: top center; min-height: 700px;">
    <div class="container">
        <div class="row">
            <div class="card card-signup" data-background-color="orange">
                <form class="form" method="POST" action="" autocomplete="off">
                    <div class="card-header text-center">
                        <h3 class="card-title title-up">Editar</h3>
                    </div>
                    <div class="card-body">
                        <div class="input-group no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" autocomplete="nope" required>
                        </div>

                        <div class="input-group no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="now-ui-icons ui-1_email-85"></i>
                                </span>
                            </div>
                            <input type="Email" class="form-control" placeholder="Email" name="email" id="email" autocomplete="nope" required>
                        </div>

                        <div class="input-group no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="now-ui-icons objects_key-25"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" autocomplete="nope" required>
                        </div>

                        <div class="input-group no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-facebook-square"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Link Perfil Facebook" name="fcUser" id="fcUser" autocomplete="nope">
                        </div>

                        <div class="input-group no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-twitter"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Link Perfil Twitter" name="twUser" id="twUser" autocomplete="nope">
                        </div>

                        <div class="input-group no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-instagram"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Link Perfil Instagram" name="inUser" id="inUser" autocomplete="nope">
                        </div>
                    </div>
                    <div class="card-footer text-center">
                    </div>
                </form>
            </div>
            <div class="card card-signup" >
                <div class="card-body">
                    <div class="card-header text-center">
                        <h3 class="card-title title-up">Sobre mi</h3>
                    </div>
                    <div class="input-group no-border">
                        <div class="form-group">
                            <div id="contenido" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col text-center">
            <a href="profile-page.php" class="btn btn-outline-info btn-round btn-lg" >Cancelar</a>
            <a onclick="upContenido()" class="btn btn-outline-warning btn-round  btn-lg">Enviar</a>
        </div>
    </div>
</div>


<script>
    var quill = new Quill('#contenido', {
        theme: 'snow'
    });

    function upContenido() {
        var sobreMi = String(quill.container.firstChild.innerHTML)
        jQuery.ajax({
            url: "up_user.php",
            data: {
                nombre: $("#nombre").val(),
                email: $("#email").val(),
                pass: $("#pass").val(),
                fcUser: $("#fcUser").val(),
                inUser: $("#inUser").val(),
                twUser: $("#twUser").val(),
                sobreMi: sobreMi
            },
            type: "POST",
            success: function(data) {
                alert('Actualizacion Exitosa')
                location.assign('profile-page.php')
            },
            error: function() {}
        });
    }
</script>

</body>

</html>