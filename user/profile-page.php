<?php
include '../assets/include/header_user.php';
include '../conexion/conection.php';
include '../assets/include/all-src.php';


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
  <div class="wrapper">
    <div class="page-header clear-filter page-header-small mb-5" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('../assets/img/bg5.jpg');">
      </div>
      <div class="container">
        <div class="photo-container">
          <img src=".<?php echo $avatar ?>" alt="">
        </div>
        <h3 class="title"><?php echo $nombre ?></h3>
        <p class="category mt-1">@<?php echo $nickname_user ?></p>
        <div class="content">
          <div class="social-description">
            <h2>26</h2>
            <p>Post</p>
          </div>
          <div class="social-description">
            <h2>50</h2>
            <p>Comentarios</p>
          </div>
          <div class="social-description">
            <h2>48</h2>
            <p>Juegos</p>
          </div>
        </div>
      </div>
    </div>
    <div class="section mt-1">
      <div class="container">
        <div class="button-container">
          <a href="#button" class="btn btn-primary btn-round btn-lg">Follow</a>
        </div>
        <h3 class="title">Sobre mi</h3>
        <h5 class="description">
          <?php echo $sobre_user?>
        </h5>
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <h4 class="title text-center">My Portfolio</h4>
            <div class="nav-align-center">
              <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#profile" role="tablist">
                    <i class="now-ui-icons design_image"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home" role="tablist">
                    <i class="now-ui-icons location_world"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#messages" role="tablist">
                    <i class="now-ui-icons sport_user-run"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Tab panes -->
          <div class="tab-content gallery">
            <div class="tab-pane active" id="home" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="../assets/img/bg1.jpg" alt="" class="img-raised">
                    <img src="../assets/img/bg3.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                    <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="../assets/img/bg6.jpg" class="img-raised">
                    <img src="../assets/img/bg11.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="../assets/img/bg3.jpg" alt="" class="img-raised">
                    <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="../assets/img/bg6.jpg" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <?php
    include '../assets/include/footers_user.php';
