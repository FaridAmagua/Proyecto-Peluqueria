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
      <h1 class="title-mechas">Mechas</h1>
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div>
              <ul class="nav nav-pills nav-stacked">
                <li><a class="nav-link" href="servicios.php">Todos los servicios &rsaquo;</a></li>
                <hr>
                <li><a class="nav-link" href="cortes.php">Cortes &rsaquo;</a></li>
                <hr>
                <li><a class="nav-link active" href="mechas.php">Mechas &rsaquo;</a></li>
                <hr>
                <li><a class="nav-link" href="tintes.php">Tintes &rsaquo;</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-10">
            <div class="col-md-12">
              <div class="col-md-6">
                <img src="imagenes/mechas2.jpg" alt="mechas3" width="400">
              </div>
              <div class="col-md-6">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <img src="imagenes/mechas1.jpg" alt="mechas1" width="265">
                  </div>
                  <div class="col-md-12">
                    <img src="imagenes/mechas.jpg" alt="mechas" width="265">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <h3><strong>Mechas</strong></h3>
                <h4>«La vida es demasiado corta para llevar un pelo aburrido»</h4>
                <p>Disfruta la peluquería de la mano de las mejores estilistas profesionales de Madrid, en nuestros salones encontrarás toda una gama de servicios y técnicas de mechas, servicios novedosos y vanguardistas para que puedas disponer de la últimas tendencias al lado de casa, todo realizado con productos de máxima calidad que cuidarán y protegerán tu cabello potenciando el brillo y dejando que luzcas una melena espl&eacute;ndida y sana.</p>
                <a href="tarifas.php" class="btn btn-danger" role="button">Tarifas</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require 'footer.php'; ?>
  </body>
</html>