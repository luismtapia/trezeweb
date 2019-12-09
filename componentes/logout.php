<?php
  include('treze.class.php');
  $sitio->logout();
  $mensaje='GRACIAS POR USAR EL SISTEMA';
  $direccion = "<a class='iconos' href='login.php'><span class='fa fa-arrow-circle-left'> </span> Regresar</a>";
  if (isset($_GET['code'])) {
    $code=$_GET['code'];
    switch($code){
      case 0: $mensaje='USUARIO Y CONTRASEÑAS INCORRECTAS';
        break;
      case 1: $mensaje='USTED NO TIENE EL ROL PERMITIDO';
        break;
      case 2:
        break;
      default:
        # code...
        break;
    }
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link rel="stylesheet" type="text/css" href="../css/login.css">
      <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <title>Cerrar sesion</title>
  </head>
  <body>
    <div class="caja">
          <form class="" action="login.php" method="post" >
            <div class="iniciar_sesion">
              <h3 class="form-titulo" id="iniciar_sesion"><?php echo $mensaje; ?></h3>
            </div>

            <div class="animacion1">
                <h5 class="logo">|3 TREZE</h5>
            </div>
            <div class="botonera">
                <?php echo $direccion;?>
            </div>
          </form>
    </div>
  </body>
</html>
