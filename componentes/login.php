<?php
    //include 'componentes/header.php';
    /*include('treze.class.php');
    include('config.php');
    if (isset($_POST['iniciar'])) {
      $data = $_POST;
      var_dump($_POST);
      $fila=$sitio->login($data);
      $fila['usuario'];

      //header("Location: inicio.php");
    }*/
    include('treze.class.php');
    include('config.php');
    if (isset($_POST['iniciar'])) {
      $data = $_POST;
      //var_dump($_POST);
      //$sitio->registro($data);
      //header("Location: inicio.php");
    }
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TREZE</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/bubbly.css">
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  </head>
  <body>
    <div class="caja">

      <form class="" action="validar.php" method="post" onsubmit="enviar(event, this)">
        <div class="iniciar_sesion">
      		<h2 class="form-titulo" id="iniciar_sesion">Iniciar sesion</h2>
      		<div class="form-cuerpo">

      			<input type="text" name="usuario" class="input" placeholder="Usuario" title=""/>

      			<input type="password" name="contrasena" class="input" placeholder="Password" />

      		</div>
      	</div>
        <div class="centrado">
          <button type="submit" name="iniciar" class="bubbly-button">Iniciar sesion</button>
        </div>

        <div class="animacion1">
          <h5 class="logo">|3 TREZE</h5>
        </div>
        <div class="botonera">
            <a class="iconos" href="registrarse.php">Registrate <span class="fa fa-arrow-circle-right"></span> </a>
        </div>
      </form>
    </div>

    <script src="js/script_burbujas.js"></script>

    <script type="text/javascript">
        function enviar(evento, formulario){
          evento.preventDefault(); //Cancelo el envío
          setTimeout(function(){ //Aplico el temporizador
              formulario.submit(); //Envío los datos
          }, 1000);
        }
    </script>
  </body>
</html>
