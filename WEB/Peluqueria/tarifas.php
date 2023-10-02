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
      <h1 class="title-tarifas">Tarifas</h1>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="column-inner ">
              <h3 class="heading "><span>Nuestros Precios</span></h3><br>
              <div class="tab-tarifas">
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
    <?php require 'footer.php'; ?>
  </body>
</html>