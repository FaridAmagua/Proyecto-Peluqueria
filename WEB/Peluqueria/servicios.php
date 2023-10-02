<?php
  require 'check_session.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Peluquer&iacute;a</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="font.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://consent.cookiefirst.com/banner.js" data-cookiefirst-key="6e593284-66a8-4cb7-ba0a-918adad36cd2"></script>
  </head>
  <body>
    <?php require 'menu.php'; ?>
    <div class="social-bar">
      <a href="https://www.facebook.com/fran.luengo.35/" class="icon icon-facebook2" target="_blank"></a>
      <a href="https://www.instagram.com/peluqueriafandf/" class="icon icon-instagram" target="_blank"></a>
    </div>
    <div class="container">
      <h1 class="title-servicios">Servicios</h1>
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div>
              <ul class="nav nav-pills nav-stacked">
                <li><a class="nav-link active" href="servicios.php">Todos los servicios &rsaquo;</a></li>
                <hr>
                <li><a class="nav-link" href="cortes.php">Cortes &rsaquo;</a></li>
                <hr>
                <li><a class="nav-link" href="mechas.php">Mechas &rsaquo;</a></li>
                <hr>
                <li><a class="nav-link" href="tintes.php">Tintes &rsaquo;</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-10">
            <div class="col-md-12">
              <div class="col-md-6">
                <div>
                  <img src="imagenes/corte-hombre.jpg" alt="corte-pelo-hombre" width="450">
                </div>
                <div>
                  <h3>Cortes</h3>
                  <p>Disfruta la peluquer&iacute;a de la mano de las mejores estilistas profesionales de Madrid, en nuestro sal&oacute;n encontrar&aacute;s toda una gama de servicios y t&eacute;cnicas de corte, servicios novedosos y vanguardistas para que puedas disponer de la &uacute;ltimas tendencias al lado de casa.</p>
                </div>
                <div>
                  <a href="cortes.php" class="btn btn-info" role="button">SABER M&Aacute;S</a>
                </div>
              </div>
              <div class="col-md-6">
                <div>
                <img src="imagenes/mechas.jpg" alt="mechas-pelo" width="450">
                </div>
                <div>
                  <h3>Mechas</h3>
                  <p>En nuestros salones encontrarás un servicio personalizado y adaptado plenamente a ti y a tus necesidades, con un diagnóstico previo que te practicará nuestro equipo técnico, adaptando los parámetros al estado actual de tu piel y tu vello.</p>
                </div>
                <div>
                  <a href="mechas.php" class="btn btn-info" role="button">SABER M&Aacute;S</a>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-6">
                <div>
                  <img src="imagenes/tintes.jpg" alt="tintes-pelo" width="450">
                </div>
                <div>
                  <h3>Tintes</h3>
                  <p>En nuestros salones encontrarás un servicio personalizado y adaptado plenamente a ti y a tus necesidades, con un diagnóstico previo que te practicará nuestro equipo técnico, adaptando los parámetros al estado actual de tu piel y tu vello.</p>
                </div>
                <div>
                  <a href="tintes.php" class="btn btn-info" role="button">SABER M&Aacute;S</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require 'footer.php'; ?>
  </body>
</html>