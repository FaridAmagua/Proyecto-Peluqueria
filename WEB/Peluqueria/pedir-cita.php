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
      <h1 class="title-servicios">Pedir cita</h1>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="pedir.php" method="POST">
              <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" placeholder="Introducir usuario" name="usuario" required>
              </div>
              <div class="form-group">
                <label for="tratamiento">Tratamiento:</label>
                  <select class="form-control" name="tratamiento" id="tratamiento" required>
                    <option value="Corte mujer">Corte mujer</option>
                    <option value="Corte hombre">Corte hombre</option>
                    <option value="Corte niño/a">Corte niño/a</option>
                    <option value="Mechas matizado">Mechas matizado</option>
                    <option value="Mechas cabello largo">Mechas cabello largo</option>
                    <option value="Mechas cabello medio">Mechas cabello medio</option>
                    <option value="Mechas cabello corto">Mechas cabello corto</option>
                    <option value="Decoloración completa">Decoloración completa</option>
                    <option value="Tinte mascarilla color">Tinte mascarilla color</option>
                  </select>
              </div>
              <div class="form-group">
                <div class='input-group date'>
                  <label for="fecha">Fecha:</label><br>
                  <input type="datetime-local" id="fecha"
                   name="fecha">
                </div>
              </div>
              <button type="submit" name="aceptar" class="btn btn-default">Aceptar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php require 'footer.php'; ?>
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function(event){
        document.getElementById('fecha').value = new Date().toDateInputValue();
      });
    </script>
  </body>
</html>