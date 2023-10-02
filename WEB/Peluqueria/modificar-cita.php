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
    <div class="container">
      <h1 class="title-servicios">Modificar cita</h1>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="modificar.php" method="POST">
              <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" placeholder="Introducir usuario" name="usuario" required>
              </div>
              <div class="form-group">
                <div class='input-group date'>
                  <label for="fecha">Fecha antigua:</label><br>
                  <input type="datetime-local" id="fecha"
                   name="fechaantigua">
                </div>
              </div>
              <div class="form-group">
                <div class='input-group date'>
                  <label for="fecha">Fecha nueva:</label><br>
                  <input type="datetime-local" id="fecha"
                   name="fechanueva">
                </div>
              </div>
              <button type="submit" name="aceptar" class="btn btn-default">Aceptar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php require 'footer.php'; ?>
  </body>
</html>