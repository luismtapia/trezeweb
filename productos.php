<?php
    include 'componentes/treze.class.php';
    $data=$sitio->obtenerProductos();
    //print_r($data);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>|3 TREZE Categorias</title>
    <?php include 'componentes/header.php'; ?>
  </head>
  <body>
    <?php include 'componentes/menu.html'; ?>

    <section class="cuerpo">
        <article class="titulo">
          <div class="tarjeta-titulo">
            <p id="titulo">Productos</p>
          </div>
        </article>
    </section>
    <article class="cuerpo" >
      <div class="contenido-tablas">
        <div class="titulo-tabla">
            <div class="row">
                <div class="col-sm-6">
                    <h2>CRUD <b>Productos</b></h2>
                </div>
                <div class="">
                    <a href="cruds/productos.insertar.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> Nuevo</a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Marca</th>
              <th>Existencia</th>
              <th>$ Compra</th>
              <th>$ Venta</th>
              <th>Descuento</th>
              <th>Fecha de Captura</th>
              <th>actions</th>
            </tr>
          </thead>
          <?php for ($i=0; $i <count($data) ; $i++): ?>
            <tbody>
              <tr>
                <td><?php echo $data[$i]['producto']; ?> </td>
                <td><?php echo $data[$i]['descripcion']; ?></td>
                <td><?php echo $data[$i]['marca']; ?></td>
                <td><?php echo $data[$i]['cantidad']; ?></td>
                <td><?php echo $data[$i]['precio_compra']; ?> </td>
                <td><?php echo $data[$i]['precio_venta']; ?></td>
                <td><?php echo $data[$i]['descuento']; ?></td>
                <td><?php echo $data[$i]['fecha_captura']; ?></td>
                <td>
                    <a href="cruds/productos.actualizar.php?id_producto=<?php echo $data[$i]['id_producto'];?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="cruds/produsctos.eliminar.php?id_producto=<?php echo $data[$i]['id_producto'];?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
