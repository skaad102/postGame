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

<body class="profile-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="dropdown button-dropdown">
        <a href="#" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
          <span class="button-bar"></span>
          <span class="button-bar"></span>
          <span class="button-bar"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Inicio</a>
          <a class="dropdown-item" href="#">Publicar</a>
        </div>
      </div>
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/now-ui-kit/index.html" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
          Now Ui Kit
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/<?php echo $tw_user?>" target="_blank">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/<?php echo $fb_user?>" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/<?php echo $in_user?>" target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <div class="dropdown button-dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="ajustes" data-toggle="dropdown" aria-expanded="false">
                <i class="now-ui-icons ui-1_settings-gear-63" aria-hidden="true"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="ajustes">
                <a class="dropdown-header">Ajustes</a>
                <a class="dropdown-item" href="edit-profile.php">Editar Perfil</a>
                <a class="dropdown-item  btn-danger" href="../assets/include/cerrarSesion.php">Salir</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
