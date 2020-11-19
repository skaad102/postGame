<?php
include './assets/include/header.php'
?>

<body class="login-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top  " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#" rel="tooltip" title="Juega En Grande" data-placement="bottom" target="_blank">
          Now Play
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Descarga aplicacion de escritorio" data-placement="bottom" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Download</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Siguenos en Twitter" data-placement="bottom" href="https://twitter.com/" target="_blank">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Siguenos en Facebook" data-placement="bottom" href="https://www.facebook.com/" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Siguenos en Instagram" data-placement="bottom" href="https://www.instagram.com/" target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" style="background-image:url(./assets/img/game1.jpg)"></div>
      <div class="content">
        <div class="container">
          <div class="col-md-4 ml-auto mr-auto">
            <div class="card card-login card-plain">
              <form class="form" method="POST" action="verificar_log.php" autocomplete="off">
                <div class="card-body">
                  <div class="input-group no-border input-lg">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons users_circle-08"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="usuario" name="user">
                  </div>
                  <div class="input-group no-border input-lg">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons objects_key-25"></i>
                      </span>
                    </div>
                    <input type="password" placeholder="Contraseña" name="pass" class="form-control" />
                  </div>
                </div>
                <div class="card-footer text-center">
                  <input type="submit"  class="btn btn-primary btn-round btn-lg btn-block" value="Entrar">
                  <div class="pull-left">
                    <h6>
                      <a target="_blank" href="nuevo.php" class="link">Crear Cuenta</a>
                    </h6>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include './assets/include/footer_user.php';
