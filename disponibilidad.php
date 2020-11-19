<?php
    include './conexion/conection.php';

    if(!empty($_POST["email"])) {

        $selCorreoUser = $Con->prepare('SELECT COUNT(*) FROM usuario WHERE correo_user  =  ?');
        $selCorreoUser->execute(array($_POST["email"]));

        $row = $selCorreoUser->fetch();
        $Con = null;
        if($row['COUNT(*)']>0){
            echo '<div class="alert alert-warning" role="alert">
            <strong>Correo Existente!</strong> Ingresa otro.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }else{
            echo '<div class="alert alert-success" role="alert">
            <strong>Correo Disponible!</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

    }

    if(!empty($_POST["user"])) {

        $selUser = $Con->prepare('SELECT COUNT(*) FROM usuario WHERE nickname_user  =  ?');
        $selUser->execute(array($_POST["user"]));

        $row = $selUser->fetch();
        $Con = null;
        if($row['COUNT(*)']>0){
            echo '<div class="alert alert-warning" role="alert">
            <strong>Usuario Existente!</strong> Ingresa otro.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }else{
            echo '<div class="alert alert-success" role="alert">
            <strong>Usuario Disponible!</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

    }