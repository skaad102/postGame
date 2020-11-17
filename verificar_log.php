<?php
include './assets/include/all-src.php';
include './assets/include/alerta.php';
include './conexion/conection.php';
include './assets/include/blowfish.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = htmlentities($_POST['user']);
    $pass = htmlentities($_POST['pass']);

    $selClave = $Con->prepare('SELECT pass_user,Id_user,avatar_user FROM usuario WHERE nickname_user  =  ?');
    $selClave->execute(array($user));
    $row = $selClave->fetch();
    $claveConSalt = $row['pass_user'];
    if(password_verify($pass, $claveConSalt)) {
        $id = $row['Id_user'];
        $avatar = $row['avatar_user'];
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $id;
        header("location:user/profile-page.php");
    } else {
        echo alerta('Datos incorectos intenta de nuevo','login-page.php');
    }
}else{
    echo alerta('Utilizar loging','login-page.php');
}