<?php 
	include 'componentes/treze.class.php';
    if(isset($_POST['abonar_apartado'])){
      $data=$_POST;
      $monto_nuevo=$data['monto_abono_nuevo'];
      $monto_a_liquidar=$data['monto_liquidar'];
      if ($monto_nuevo<=$monto_a_liquidar) {
      	$monto_de_abono=$data['monto_abono'];
      	$NUEVO_MONTO_ABONO=$monto_de_abono+$monto_nuevo;
      	$NUEVO_MONTO_LIQUIDAR=$monto_a_liquidar-$monto_nuevo;

      	$sitio->actualizarAbonoApartado($data['id_apartado'],$NUEVO_MONTO_ABONO,$NUEVO_MONTO_LIQUIDAR);
      	echo '<div class="alert alert-success" role="alert"> Haz abonado a tu cuenta </div>';
      	header('Location: apartados.php');
      }
      else{
      	echo '<div class="alert alert-success" role="alert">El monto a abonar no puede ser mayor a el monto liquidado</div>';
      }
      //print_r($data);//die();
      
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/treze.css">
</head>
<body>
	<article class="cuerpo">
      <div class="contenido-tablas">
        <div class="card-productos">
          <form method="post">
            <div class="form-group">
              <a href="apartados.php" class="btn btn-danger">Regresar</a>
            </div>
          </form>
        </div>

      </div>
    </article>
</body>
</html>