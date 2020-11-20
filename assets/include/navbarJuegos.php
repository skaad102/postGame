<?php
ob_start();
session_start();

$UserSesion = $_SESSION['user'];
if ($UserSesion == null || $UserSesion = '') {
  header('location:../index.php');
  /* echo alerta('No tienes permisos','../index.php'); */
  die();
} elseif (!isset($UserSesion)) {
  session_destroy();
  header('location:index.php');
  die();
}

$SelcUser = $Con->prepare('SELECT nombre_user,avatar_user,sobre_user,fb_user,tw_user,in_user
            FROM usuario WHERE nickname_user  =  ?');
$SelcUser->execute(array($_SESSION['user']));


$row = $SelcUser->fetch();
$nombre = $row['nombre_user'];
$avatar = $row['avatar_user'];
$sobre_user = $row['sobre_user'];
$nickname_user = $_SESSION['user'];
$fb_user = $row['fb_user'];
$tw_user = $row['tw_user'];
$in_user = $row['in_user'];


?>

<body >
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
    <a class="navbar-brand" href="profile-page.php">Now Play</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link " id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars"></i>
            </a>
            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="profile-page.php">Inicio</a>
            <a class="dropdown-item" href="#">Publicar</a>
            <a class="dropdown-item" href="#">Juegos</a>
            </div>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="https://twitter.com/<?php echo $tw_user?>" target="_blank">
            <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="https://www.facebook.com/<?php echo $fb_user?>" target="_blank">
            <i class="fab fa-facebook"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="https://www.instagram.com/<?php echo $in_user?>" target="_blank">
            <i class="fab fa-instagram"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cogs"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-default"
            aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="edit-profile.php">Editar Perfil</a>
            <a class="dropdown-item" href="../assets/include/cerrarSesion.php">Salir</a>
            </div>
        </li>
        </ul>
    </div>
    </div>
    </nav>

<!--/.Navbar -->
  <!-- End Navbar -->
