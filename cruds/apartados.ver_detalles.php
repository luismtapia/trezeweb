<?php
    include('../componentes/treze.class.php');

    if(isset($_GET['id_apartado'])){
    	$id_apartado = $_GET['id_apartado'];
    	if(is_numeric($id_apartado)){
    		if(isset($_POST['actualizar'])){
          //$categoria=$_POST['categoria'];
    			//$sitio->actualizarCategoria($id_apartado,$categoria);
    			echo '<div class="alert alert-success" role="alert"> El categoria ha sido actualizado </div>';
          //sleep(10);
          //header('Location: ../categorias.php');
    		}
    		$parametros[':id_apartado']=$id_apartado;
        //$sql="select p.producto,p.descripcion, p.marca,p.precio_venta,pa.cantidad from productos p INNER JOIN productos_apartados pa on p.id_producto=pa.id_producto where id_apartado=2";
        $sql="select p.producto,p.descripcion, p.marca,p.precio_venta,pa.cantidad, (p.precio_venta*pa.cantidad) as total from productos p INNER JOIN productos_apartados pa on p.id_producto=pa.id_producto where id_apartado=:id_apartado";
    		$data = $sitio->queryArray($sql,$parametros);

        $sql="select * from apartados where id_apartado=:id_apartado";
        $los_apartados = $sitio->queryArray($sql,$parametros);

        $sql="select  sum(p.precio_venta*pa.cantidad) as total from productos p INNER JOIN productos_apartados pa on p.id_producto=pa.id_producto where id_apartado=:id_apartado";
        $suma = $sitio->queryArray($sql,$parametros);

    	}
    }
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <?php include('../componentes/header.php'); ?>
    <link rel="stylesheet" href="../css/treze.css">
    <title>Detalles Apartados</title>
  </head>
  <body>

    <section class="cuerpo">
        <article class="titulo">
          <div class="tarjeta-titulo">
            <p id="titulo">Ver detalles Apartados</p>
          </div>
        </article>
    </section>
    <section>
      <div class="card-productos">
        <LABEL>ID: <?php echo $los_apartados[0]['id_apartado'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</LABEL>
        <LABEL>Cliente: <?php echo $los_apartados[0]['nombre_cliente'] ?></LABEL><br>
        <LABEL>Fecha Apartado: <?php echo $los_apartados[0]['fecha_apartado'] ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</LABEL>
        <LABEL>Fecha vencimiento: <?php echo $los_apartados[0]['fecha_vencimiento'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</LABEL><br>
        <LABEL>Monto total: <?php echo $los_apartados[0]['monto_total'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</LABEL>
        <LABEL>Monto abono: <?php echo $los_apartados[0]['monto_abono'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</LABEL>
        <LABEL>Monto a liquidar: <?php echo $los_apartados[0]['monto_liquidar'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</LABEL>
      </div>
    </section>
    
    <article class="cuerpo" >
      <div class="contenido-tablas">
        <div class="titulo-tabla">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Detalles de <b>Apartado de <?php echo $los_apartados[0]['nombre_cliente'] ?></b></h2>
                </div>
            </div>
        </div>
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              
              <th>Producto</th>
              <th>Descripcion</th>
              <th>Marca</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Total</th>
              
            </tr>
          </thead>
          <?php for ($i=0; $i <count($data) ; $i++): ?>
            <tbody>
              <tr>
                <td><?php echo $data[$i]['producto'] ?></td>
                <td><?php echo $data[$i]['descripcion']; ?> </td>
                <td><?php echo $data[$i]['marca']; ?></td>
                <td><?php echo $data[$i]['precio_venta']; ?></td>
                <td><?php echo $data[$i]['cantidad']; ?></td>
                <td><?php echo $data[$i]['total']; ?> </td>
              </tr>
            </tbody>

          <?php endfor; ?>
          <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total a pagar</td>
                <td><?php echo $suma[0]['total']; ?> </td>
              </tr>
          </tfoot>
        </table>
      </div>
    </article>


    <article class="cuerpo">
      <div class="contenido-tablas">
        <div class="card-productos">
          <form action="../reportes/reporte_apartado.php?id_apartado=<?php echo $id_apartado; ?>" method="post"  target="_blank">
            <div class="form-group">
              <input type="submit" name="reporte" value="Generar reporte" class="btn btn-success">
              <a href="../apartados.php" class="btn btn-danger">Regresar</a>
            </div>
          </form>
        </div>

      </div>
    </article>


    <script src="../js/validacion_forms.js"></script>
  </body>
</html>
