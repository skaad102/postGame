<?php
include '../assets/include/header_user.php';
include '../conexion/conection.php';
include '../assets/include/all-src.php';
include '../assets/include/navbar.php';
include '../assets/include/alerta.php';


$nickname_user = htmlentities($_GET['nickname_user']);

$user = $Con->prepare('SELECT count(*) FROM usuario WHERE nickname_user =  ?');
$user->execute(array($_GET['nickname_user']));


if ($nickname_user == null || $nickname_user = "")  {
  echo alerta('usuario no encontrado', 'profile-page.php');
}elseif($user->fetchColumn() == 0){
  echo alerta('usuario no encontrado', 'profile-page.php');
  die;
}

$SelUserGet = $Con->prepare('SELECT nombre_user,avatar_user,sobre_user,nickname_user 
            FROM usuario WHERE nickname_user  =  ?');
$SelUserGet->execute(array(htmlentities($_GET['nickname_user'])));


$row = $SelUserGet->fetch();
$nombre = $row['nombre_user'];
$avatar = $row['avatar_user'];
$sobre_user = $row['sobre_user'];
$nickname_user = $row['nickname_user'];



$SelcUser = null;

$SelcJuegosCraked = $Con->prepare('SELECT * FROM juego INNER JOIN usuario ON usuario.Id_user = juego.id_FK_User WHERE nickname_user   =  ? AND juegoEstado = "Cracked"');
$SelcJuegosCraked->execute(array(htmlentities($_GET['nickname_user'])));
$SelcJuegosNoCraked = $Con->prepare('SELECT * FROM juego INNER JOIN usuario ON usuario.Id_user = juego.id_FK_User WHERE nickname_user   =  ? AND juegoEstado = "Uncracked"');
$SelcJuegosNoCraked->execute(array(htmlentities($_GET['nickname_user'])));



$SelectNumPost = $Con->prepare('SELECT COUNT(*) FROM juego INNER JOIN usuario ON usuario.Id_user = juego.id_FK_User WHERE nickname_user   =  ?  ');
$SelectNumPost->execute(array(htmlentities($_GET['nickname_user'])));
$numPost = $SelectNumPost->fetch();
$SelectNumPost = null;

$SelectNumPostCra = $Con->prepare('SELECT COUNT(*) FROM juego INNER JOIN usuario ON usuario.Id_user = juego.id_FK_User WHERE nickname_user   =  ? AND juegoEstado = "Cracked" ');
$SelectNumPostCra->execute(array(htmlentities($_GET['nickname_user'])));
$numPostCra = $SelectNumPostCra->fetch();


$resultadoCrak = $SelcJuegosCraked->fetchAll();
$resultadoNoCrak = $SelcJuegosNoCraked->fetchAll();
?>


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
          <h2><?php echo $numPost['COUNT(*)'] ?></h2>
          <p>Post</p>
        </div>
        <div class="social-description">
          <h2>50</h2>
          <p>Comentarios</p>
        </div>
        <div class="social-description">
          <h2><?php echo $numPostCra['COUNT(*)'] ?></h2>
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
      <h5 class="description text-center">
        <?php echo $sobre_user ?>
      </h5>
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <h4 class="title text-center">My Portfolio</h4>
          <div class="nav-align-center">
            <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#crack" role="tablist">
                  <i class="now-ui-icons design_image"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#uncrack" role="tablist">
                  <i class="now-ui-icons location_world"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content gallery">
          <div class="tab-pane active" id="uncrack" role="tabpanel">
            <?php foreach ($resultadoNoCrak as $Ju) : ?>
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="view overlay">
                        <img class="card-img-top" src="<?php echo $Ju['imagen'] ?>" alt="Imagen juego">
                        <a>
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h4 class="card-title">Nombre: <?php echo $Ju['nombre'] ?> </h4>
                        <h4 class="card-title">link: <a href="https://<?php echo $Ju['linkDescarga'] ?>"><?php echo $Ju['linkDescarga'] ?><a></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach;
            $Con = null;
            $SelcJuegosCraked = null;
            $SelcUser = null ?>
          </div>

          <div class="tab-pane" id="crack" role="tabpanel">
            <?php foreach ($resultadoCrak as $Ju) : ?>
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="view overlay">
                        <img class="card-img-top" src="<?php echo $Ju['imagen'] ?>" alt="Imagen juego">
                        <a>
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h4 class="card-title">Nombre: <?php echo $Ju['nombre'] ?> </h4>
                        <h4 class="card-title">link: <a href="https://<?php echo $Ju['linkDescarga'] ?>"><?php echo $Ju['linkDescarga'] ?><a></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach;
            $Con = null;
            $SelcJuegosCraked = null;
            $SelcUser = null ?>
          </div>


        </div>
      </div>
    </div>
  </div>

  <?php
  include '../assets/include/footer_user.php';
