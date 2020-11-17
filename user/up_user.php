<?php
include '../assets/include/all-src.php';
include '../conexion/conection.php';
include '../assets/include/alerta.php';
include '../assets/include/blowfish.php';
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nombre = htmlentities($_POST['nombre']);
    $email = htmlentities($_POST['email']);
    $pass = htmlentities($_POST['pass']);
    $fcUser = substr($_POST['fcUser'],25);
    $inUser = substr($_POST['inUser'],26);
    $twUser = substr($_POST['twUser'],20);
    $sobreMi = $_POST['sobreMi'];
    $user = $_SESSION['user'];
    //$_SESSION['id']
    $pass = EncryClave($pass);

    $upUser = $Con->prepare('UPDATE usuario SET nombre_user = :nombre , correo_user = :email  , pass_user = :pass,
         sobre_user = :sobreMi , fb_user = :fcUser, tw_user = :twUser , in_user = :inUser  WHERE nickname_user = :user');
    $upUser->bindParam(':nombre',$nombre);
    $upUser->bindParam(':email',$email);
    $upUser->bindParam(':pass',$pass);
    $upUser->bindParam(':sobreMi',$sobreMi);
    $upUser->bindParam(':fcUser',$fcUser);
    $upUser->bindParam(':twUser',$twUser);
    $upUser->bindParam(':inUser',$inUser);
    $upUser->bindParam(':user',$user);
    if($upUser->execute()){
        $Con =  null;
        echo alerta('Actualizacion Exitosa','profile-page.php');
    }else{
        echo alerta('Error Actualizacion','profile-page.php');
    }


}else{
    echo alerta('Utilizar formulario','profile-page.php');
}

