<?php
include './assets/include/header.php'
?>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class=" navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate ">
                <a class="navbar-brand " href="#" rel="tooltip" title="Juega En Grande" data-placement="bottom" target="_blank">
                    Now Play
                </a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <!--       <div class="page-header-image" style="background-image:url(./assets/img/game1.jpg)"></div> -->
            <div class="content">
                <div class="container">
                    <div class="col-md-4 ml-auto mr-auto">
                        <div class="card card-login card-plain">
                            <form class="form" method="POST" action="insert_usuario.php" autocomplete="off" enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="input-group no-border input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="now-ui-icons users_circle-08"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="usuario" id="user" name="user" onBlur="comprobarUsuario()" required />
                                    </div>

                                    <span id="estadouser"></span>

                                    <div class="input-group no-border input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="now-ui-icons users_single-02"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="nombre" name="nombre" required />
                                    </div>

                                    <div class="input-group no-border input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="now-ui-icons ui-1_send"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="correo" autocomplete="off" id="email" name="email" required onBlur="comprobarEmail()" />
                                    </div>

                                    <span id="estadoemail"></span>

                                    <div class="input-group no-border input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </span>
                                        </div>
                                        <input type="password" placeholder="Contraseña" name="pass" class="form-control" required />
                                    </div>

                                    <div class="input-group no-border input-lg">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="avatar" accept="image/*" />
                                            <label class="custom-file-label" for="avatar">Seleccionar Archivo</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer text-center">
                                    <input type="submit" class="btn btn-primary btn-round btn-lg btn-block" value="Crear Cuenta">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include './assets/include/footer_user.php';
