<?php
	 include 'componentes/treze.class.php';

	 $data=$sitio->obtenerApartados();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <title>|3 TREZE Categorias</title>
    <?php include 'componentes/header.php'; ?>
  </head>
  <body>
    <?php include 'componentes/menu.html'; ?>

    <section class="cuerpo">
        <article class="titulo">
          <div class="tarjeta-titulo">
            <p id="titulo">Apartados</p>
          </div>
        </article>
    </section>
    <article class="cuerpo" >
      <div class="contenido-tablas">
        <div class="titulo-tabla">
            <div class="row">
                <div class="col-sm-6">
                    <h2>CRUD <b>Apartados</b></h2>
                </div>
            </div>
        </div>
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre del cliente</th>
              <th>Fecha apartado</th>
              <th>Fecha vencimiento</th>
              <th>Total</th>
              <th>$ Abonado</th>
              <th>$ A liquidar</th>
              
              <th>actions</th>
            </tr>
          </thead>
          <?php for ($i=0; $i <count($data) ; $i++): ?>
            <tbody>
              <tr>
                <td><?php echo $data[$i]['id_apartado'] ?></td>
                <td><?php echo $data[$i]['nombre_cliente']; ?> </td>
                <td><?php echo $data[$i]['fecha_apartado']; ?></td>
                <td><?php echo $data[$i]['fecha_vencimiento']; ?></td>
                <td><?php echo $data[$i]['monto_total']; ?></td>
                <td><?php echo $data[$i]['monto_abono']; ?> </td>
                <td><?php echo $data[$i]['monto_liquidar']; ?></td>
                
                <td>
                    <a href="cruds/apartados.ver_detalles.php?id_apartado=<?php echo $data[$i]['id_apartado'];?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Ver detalles">remove_red_eye</i></a>
                    <a href="cruds/apartados.abonar.php?id_apartado=<?php echo $data[$i]['id_apartado'];?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Abonar">monetization_on</i></a>
                    
                </td>
              </tr>
            </tbody>
          <?php endfor; ?>
        </table>
      </div>
    </article>

    <script src="js/validacion_forms.js"></script>
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
