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
      <h1 class="title-servicios">Registrarse</h1>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="registro.php" method="POST">
              <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario" required>
              </div>
              <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Introducir nombre" name="nombre" required>
              </div>
              <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" placeholder="Introducir contraseña" name="contrasena" required>
              </div>
              <div class="form-group">
                <label for="apellido_1">Primer apellido:</label>
                <input type="text" class="form-control" id="apellido_1" placeholder="Introducir primer apellido" name="apellido_1" required>
              </div>
              <div class="form-group">
                <label for="apellido_2">Segundo apellido:</label>
                <input type="text" class="form-control" id="apellido_2" placeholder="Introducir segundo apellido" name="apellido_2" required>
              </div>
              <div class="form-group">
                <label for="telefono">Tel&eacute;fono:</label>
                <input type="text" class="form-control" id="telefono" placeholder="Introducir tel&eacute;fono" name="telefono" required>
              </div>
              <div class="form-group">
                <label for="direccion">Direcci&oacute;n:</label>
                <input type="text" class="form-control" id="direccion" placeholder="Introducir direcci&oacute;n" name="direccion" required>
              </div>
              <div class="form-group">
                <label for="email">Correo electr&oacute;nico:</label>
                <input type="email" class="form-control" id="email" placeholder="Introducir correo electr&oacute;nico" name="email" required>
              </div>
              <div class="form-group">
                  <label class="radio-inline" required>
                    <input type="radio" name="optradio" value="No especificar" checked>No especificar
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="optradio" value="Hombre">Hombre
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="optradio" value="Mujer">Mujer
                  </label>
              </div>
              <button type="submit" name="registrar" class="btn btn-default">Registrarse</button><br><br>
              <div>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>.</div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php require 'footer.php'; ?>
  </body>
</html>
