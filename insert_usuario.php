<?php
include './assets/include/all-src.php';
include './assets/include/alerta.php';
include './conexion/conection.php';
include './assets/include/blowfish.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = htmlentities($_POST['user']);
    $nombre = htmlentities($_POST['nombre']);
    $email = htmlentities($_POST['email']);
    $pass = htmlentities($_POST['pass']);

    if ($_FILES['avatar']['error'] > 0) {
        echo alerta('Eror en la imagen', 'nuevo.php');
    } else {
        $Ruta = $_FILES['avatar']['tmp_name'];
        $Imagen = $_FILES['avatar']['name'];
        if ($Ruta != '') {
            $ancho = 500;
            $alto = 400;
            $info = pathinfo($Imagen);
            $tam = getimagesize($Ruta);
            $width = $tam[0];
            $heigth = $tam[1];
    
            if ($info['extension'] == 'jpg' || $info['extension'] == 'JPG' || $info['extension'] == 'jpeg' || $info['extension'] == 'JPEG') {
                $imgVieja = imagecreatefromjpeg($Ruta);
                $imgNueva = imagecreatetruecolor($ancho, $alto);
                imagecopyresampled($imgNueva, $imgVieja, 0, 0, 0, 0, $ancho, $alto, $width, $heigth);
                $Copia = './assets/img/avatar/' . $user . '.jpg';
                imagejpeg($imgNueva, $Copia);
            } elseif ($info['extension'] == 'png' || $info['extension'] == 'PNG') {
                $imgVieja = imagecreatefrompng($Ruta);
                $imgNueva = imagecreatetruecolor($ancho, $alto);
                imagecopyresampled($imgNueva, $imgVieja, 0, 0, 0, 0, $ancho, $alto, $width, $heigth);
                /* Imagen redimencionada guadada como copia */
                $Copia = './assets/img/avatar/' . $user . '.png';
                imagepng($imgNueva, $Copia);
            } else {
                echo alerta('Error en Formato de Imagen', 'nuevo.php');
            }
        } 
    }

    $pass = EncryClave($pass);

    $Selecuser = $Con->prepare('SELECT * FROM usuario WHERE $user =  ?');
    $Selecuser->execute(array($user));

    if ($Selecuser->fetchColumn() > 0) {
        echo alerta('ya esxixte este usuario', 'nuevo.php');
    } else {
        $inserUser = $Con->prepare('INSERT INTO (`Id_user`, `nickname_user`, `nombre_user`, `correo_user`, `pass_user`, `avatar_user`) usuario VALUES(DEFAULT, :nickname_user, :nombre_user, :correo_user, :pass_user, :avatar_user)');
        $inserUser->bindparam(':nickname_user', $user);
        $inserUser->bindparam(':nombre_user', $nombre);
        $inserUser->bindparam(':correo_user', $email);
        $inserUser->bindparam(':pass_user', $pass);
        $inserUser->bindparam(':avatar_user', $Copia);
        if ($inserUser->execute()) {
            echo alerta('Registro Exitoso', 'login-page.php');
        } else {
            echo 'erro';
        }
    }
} else {
    echo alerta('utilizar loging', 'nuevo.php');
}
?>
</body>