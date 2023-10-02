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
    <div class="container-fluid"><br><br>
      <div class="row">
        <div class="col-sm-12 text-left">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
              <div class="item active">
                  <img src="imagenes/logo.jpg" alt="logo" width="2000">              
              </div>
              <div class="item">
                  <img src="imagenes/carrusel1.jpg" alt="carrusel1" width="2000">
                  <div class="carousel-caption">
                    <h3>Nuestros servicios</h3>
                    <h4 class="carrusel-text">Disfruta la peluquería de la mano de los mejores estilistas profesionales de Madrid</h4>
                    <a href="servicios.php" class="btn btn-info" role="button">SABER M&Aacute;S</a>
                  </div>
              </div>
              <div class="item">
                  <img src="imagenes/carrusel2.jpg" alt="carrusel2" width="2000">
                  <div class="carousel-caption">
                    <h3>¡Reserva ya!</h3>
                    <h4 class="carrusel-text">Pedir cita ahora es m&aacute;s f&aacute;cil que nunca.</h4>
                    <a href="pedir-cita.php" class="btn btn-info" role="button">SABER M&Aacute;S</a>
                  </div>
              </div>
              <div class="item">
                  <img src="imagenes/carrusel3.jpg" alt="carrusel3" width="2000">
                  <div class="carousel-caption">
                    <h3>Cont&aacute;ctanos</h3>
                    <h4 class="carrusel-text">Encu&eacute;ntranos en Calle Segovia, Madrid</h4>
                    <a href="contacto.php" class="btn btn-info" role="button">SABER M&Aacute;S</a>
                  </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div>
              <h1 class="title-servicios"><span>Nuestros Servicios</span></h1>
            </div><br><br>
            <div class="col-md-12">
              <div class="col-md-4">
                <div class="home-servicios">
                  <a href="cortes.php"><span class="fa fa-cut"></span></a>
                </div><br><br>
                <div>
                  <h4 class="home-servicios"><strong>Cortes</strong></h4>
                  <h5 class="home-servicios-h5">Disfruta la peluquería de la mano de las mejores estilistas profesionales de Madrid.</h5>
                </div>
              </div>
              <div class="col-md-4">
                <div class="home-servicios">
                  <a href="mechas.php"><span class="fas fa-mortar-pestle"></span></a>
                </div><br><br>
                <div>
                  <h4 class="home-servicios"><strong>Mechas</strong></h4>
                  <h5 class="home-servicios-h5">Servicio completo y personalizado con los productosmas vanguardistas.</h5>
                </div>
              </div>
              <div class="col-md-4">
                <div class="home-servicios">
                  <a href="tintes.php"><span class="fa fa-star"></span></a>
                </div><br><br>
                <div>
                  <h4 class="home-servicios"><strong>Tintes</strong></h4>
                  <h5 class="home-servicios-h5">Servicio personalizado y adaptado plenamente a ti y a tus necesidades.</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <hr>
    <div class="container">
      <h1 class="title-tarifas">Tarifas</h1>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="column-inner ">
              <div>
                <h3 class="heading "><span>Nuestros Precios</span></h3><br>
                <ul class="nav nav-tabs nav-justified mb-3">
                  <li class="active"><a href="#cortes" data-toggle="tab">Cortes</a></li>
                  <li><a href="#mechas" data-toggle="tab">Mechas</a></li>
                  <li><a href="#tintes" data-toggle="tab">Tintes</a></li>
                </ul>
                <div class="tab-content">
                  <div id="cortes" class="tab-pane active">
                    <div>
                      <div>
                        <h4>Corte Pelo Mujer</h4><span> 12€</span>
                      </div>
                    </div>
                    <div>
                      <div>
                        <h4>Corte Pelo Hombre</h4><span> 12€</span>
                      </div>
                    </div>
                    <div>
                      <div>
                        <h4>Corte Pelo Niño</h4><span> 10€</span>
                      </div>
                    </div>
                  </div>
                  <div id="mechas" class="tab-pane">
                    <div>
                      <div>
                        <h4>Mechas Cabello Largo</h4><span> 80€</span>
                      </div>
                    </div>
                    <div>
                      <div>
                        <h4>Mechas Cabello Medio</h4><span> 50€</span>
                      </div>
                    </div>
                    <div>
                      <div>
                        <h4>Mechas Cabello Corto</h4><span> 25€</span>
                      </div>
                    </div>
                  </div>
                  <div id="tintes" class="tab-pane">
                    <div>
                      <div>
                        <h4>Decoloraci&oacute;n Completa</h4><span> 15€</span>
                      </div>
                    </div>
                    <div>
                      <div>
                        <h4>Tinte Mascarilla Color</h4><span> 5€</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
          <div class="col-md-6">
            <div class="col-md-12">
              <h2>SERVICIO DE PELUQUERÍA</h2>
              <h4>DIAGNÓSTICO PERSONALIZADO ADAPTADO A TI.</h4>
              <p>Clientes de todas las edades podrán realizarse cualquier tipo de servicio <br> 
              de belleza gracias a la forma multidisciplinar de nuestros Esteticistas.</p>
              <a href="servicios.php" class="btn btn-info" role="button">SABER M&Aacute;S</a>
            </div>
          </div>
          <div class="col-md-6">
            <img src="imagenes/peluqueria.jpg" width="350">
          </div>
          </div>
        </div>
      </div>
    <?php require 'footer.php'; ?>
  </body>
</html>