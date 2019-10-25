<?php
    include('treze.class.php');
    include('config.php');
    if (isset($_POST['registrar'])) {
      $data = $_POST;
      //var_dump($_POST);
      $sitio->registro($data);

    }
 ?>

<script type="text/javascript">

</script>

 <div class="">
   <a href="login.php">Iniciar sesion</a>
 </div>
