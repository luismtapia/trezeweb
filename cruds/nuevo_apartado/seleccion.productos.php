<?php
    include '../../componentes/treze.class.php';
    $lo_buscado = "";
    if(isset($_POST['buscar'])){
          $data=$_POST;
          $lo_buscado= $data['busqueda'];
          //echo '<div class="alert alert-success" role="alert"> El Producto ha sido actualizado </div>';
          //actualizar la pagina con los datos
    }
    $busqueda=$sitio->busqueda($lo_buscado);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

        <title>|3 TREZE</title>
        <?php include '../../componentes/header.php'; ?>
        <link rel="stylesheet" href="../../css/treze.css">
  </head>
  <body>
    <section class="cuerpo">
        <article class="titulo">
          <div class="tarjeta-titulo">
            <p id="titulo">Seleccion de productos para Apartar</p>
          </div>
        </article>
    </section>
    <article class="cuerpo" >
      <div class="contenido-productos">
        <div class="card-productos">
            <form class="needs-validation" action="seleccion.productos.php" method="post" novalidate>
               <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustomUsername">Nombre del producto</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend">
                                <i class="material-icons">loyalty</i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="busqueda" id="validationCustomUsername" placeholder="Ingrese nobre del producto" required>
                            <div class="invalid-feedback">Este campo no puede estar vacio</div>
                        </div>
                    </div>
               </div>
               <button type="submit" class="btn btn-primary btn-sm " name="buscar">Buscar</button>
               <a href="terminar.apartado.php" class="btn btn-sm btn-danger">Regresar</a>
            </form>
        </div>
      </div>
    </article>

    <article class="" >
      <div class="contenido-tablas">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>Producto</th>
              <th>Marca</th>
              <th>Existencia</th>
              <th>Precio</th>
              <th>Agregar</th>
            </tr>
          </thead>
          <?php for ($i=0; $i <count($busqueda) ; $i++): ?>
            <tbody>
              <tr>
                <td></td>
                <td><?php echo $busqueda[$i]['id_producto']; ?> </td>
                <td><?php echo $busqueda[$i]['producto']; ?> </td>
                <td><?php echo $busqueda[$i]['marca']; ?> </td>
                <td><?php echo $busqueda[$i]['cantidad']; ?> </td>
                <td><?php echo $busqueda[$i]['precio_venta']; ?> </td>
                <td>
                    <a href="temporal.insertar.php?id_producto=<?php echo $busqueda[$i]['id_producto'];?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Agregar">done</i></a>
                </td>
              </tr>
            </tbody>
          <?php endfor; ?>
        </table>
      </div>

    </article>



<br><br>







<!--*********************************************************************************************************-->

<section class="cuerpo">
        <article class="titulo">
          <div class="tarjeta-titulo">
            <p id="titulo">Estos productos se van a apartar</p>
          </div>
        </article>
    </section>
    <article class="cuerpo" >
      <div class="contenido-productos">
        <div class="card-productos">
            <form class="needs-validation" action="apartados.insertar.php" method="post" novalidate>
               <button type="submit" class="btn btn-primary btn-sm " name="seleccionados">Apartar</button>
               <a href="terminar.apartado.php" class="btn btn-sm btn-danger">Regresar</a>
            </form>
        </div>
      </div>
    </article>







<?php
    $data_=$sitio->obtenerTemporal();
?>

    <article class="" >
      <div class="contenido-tablas">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>Producto</th>
              <th>Marca</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Total</th>
            </tr>
          </thead>
          <?php for ($i=0; $i <count($data_) ; $i++): ?>
            <tbody>
              <tr>
                <td></td>
                <td><?php echo $data_[$i]['id_producto']; ?> </td>
                <td><?php echo $data_[$i]['producto']; ?> </td>
                <td><?php echo $data_[$i]['marca']; ?> </td>
                <td><?php echo $data_[$i]['cantidad']; ?> </td>
                <td><?php echo $data_[$i]['precio']; ?> </td>
                <td><?php echo $data_[$i]['total']; ?> </td>
                <td>
                    <a href="cruds/.php?id_producto=<?php echo $data[$i]['id_producto'];?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">delete_forever</i></a>
                </td>
              </tr>
            </tbody>
          <?php endfor; ?>
        </table>
      </div>

    </article>


    <script src="../js/validacion_forms.js"></script>

  </body>
</html>
