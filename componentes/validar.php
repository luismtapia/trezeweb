<?php
    include('treze.class.php');
    include('config.php');

    //print_r($_POST);
    if (isset($_POST)) {
      $usuario = $_POST['usuario'];
      $contrasena = $_POST['contrasena'];
      $sitio->login($usuario,$contrasena);
      //echo "<br>:";
      //print_r($_SESSION);
      if ($_SESSION['validado']==true) {
        header("Location: ../inicio.php");
      }else{
        header("Location: login.php");
      }

    }

 ?>
