<?php
  require_once "check_session.php";
  $current_page = $_SERVER['PHP_SELF'];
?>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Peluquer&iacute;a R&F</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li <?php if(strpos($current_page, 'home.php') !== false) echo "class='active'" ?>><a href="home.php">Inicio</a></li>
            <li class="dropdown" <?php if(strpos($current_page, 'servicios.php') !== false || strpos($current_page, 'cortes.php') !== false || strpos($current_page, 'tintes.php') !== false || strpos($current_page, 'mechas.php') !== false) echo "class='active'" ?>><a class="dropdown-toggle" data-toggle="dropdown" href="servicios.html">Servicios <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li <?php if(strpos($current_page, 'servicios.php') !== false) echo "class='active'" ?>><a href="servicios.php">Todos los servicios</a></li>
                <li <?php if(strpos($current_page, 'cortes.php') !== false) echo "class='active'" ?>><a href="cortes.php">Cortes</a></li>
                <li <?php if(strpos($current_page, 'mechas.php') !== false) echo "class='active'" ?>><a href="mechas.php">Mechas</a></li>
                <li <?php if(strpos($current_page, 'tintes.php') !== false) echo "class='active'" ?>><a href="tintes.php">Tintes</a></li>
              </ul>
            </li>
            <li <?php if(strpos($current_page, 'tarifas.php') !== false) echo "class='active'" ?>><a href="tarifas.php">Tarifas</a></li>
            <li class="dropdown" <?php if(strpos($current_page, 'pedir-cita.php') !== false || strpos($current_page, 'modificar-cita.php') !== false || strpos($current_page, 'eliminar-cita.php') !== false) echo "class='active'" ?>><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cita <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li <?php if(strpos($current_page, 'pedir-cita.php') !== false) echo "class='active'" ?>><a href="pedir-cita.php">Pedir Cita</a></li>
                <li <?php if(strpos($current_page, 'modificar-cita.php') !== false) echo "class='active'" ?>><a href="modificar-cita.php">Modificar Cita</a></li>
                <li <?php if(strpos($current_page, 'eliminar-cita.php') !== false) echo "class='active'" ?>><a href="eliminar-cita.php">Eliminar Cita</a></li>
              </ul>
            </li>
            <li <?php if(strpos($current_page, 'contacto.php') !== false) echo "class='active'" ?>><a href="contacto.php">Contactos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if($session == false): ?>
            <li <?php if(strpos($current_page, 'registrarse.php') !== false) echo "class='active'" ?>><a href="registrarse.php"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
            <li <?php if(strpos($current_page, 'login.php') !== false) echo "class='active'" ?>><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesi&oacute;n</a></li>
            <?php else: ?> 
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $username; ?> <span class="caret"></span>
                <ul class="dropdown-menu">
                  <li><a href="logout.php"><span class="glyphicon glyphicon-remove"></span> Cerrar Sesión</a></li>
                </ul>
              </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>