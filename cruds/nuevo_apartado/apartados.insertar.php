<?php
    include '../componentes/treze.class.php';
    //print_r($_POST);die();
    if (isset($_POST['seleccion'])) {
      print_r($_POST);
    }
    if(isset($_POST['nuevo_apartado'])){
      $data=$_POST;
      //$data['id_usuario']=$_SESSION['id_usuario'];
      $sitio->insertarApartado($data);
      //print_r($data);
      echo '<div class="alert alert-success" role="alert"> Se ha insertado un nuevo producto </div>';;
    }


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

        <title>|3 TREZE</title>
        <?php include '../componentes/header.php'; ?>
        <link rel="stylesheet" href="../css/treze.css">
  </head>
  <body>
    <section class="cuerpo">
        <article class="titulo">
          <div class="tarjeta-titulo">
            <p id="titulo">Nuevo Apartado</p>
          </div>
        </article>
    </section>
    <article class="cuerpo" >
      <div class="contenido-productos">
        <div class="card-productos">
            <form class="needs-validation" action="apartados.insertar.php" method="post" novalidate>
              <!--****************************************************************-->
               <div class="form-row">
                    <div class="col-md-12 mb-3">
                       <label for="validationCustom01">Nombre del Cliente</label>
                       <div class="input-group">
                         <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroupPrepend">
                             <i class="material-icons">person</i>
                           </span>
                         </div>
                         <input type="text" class="form-control" name="nombre_cliente" id="validationCustom01" placeholder="Nombre del Cliente" required>
                         <div class="valid-feedback">
                         Nombre correcto!
                         </div>

                       <div class="invalid-feedback">Este campo no puede estar vacio</div>
                     </div>
                    </div>
               </div>
               <!--****************************************************************-->
               <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Fecha Apartado</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend">
                                <i class="material-icons">date_range</i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="fecha_apartado" value="<?php date_default_timezone_set('UTC'); echo date('Y-m-d'); ?>" id="validationCustom03" placeholder="Fecha Apartado" required disabled>
                            <div class="invalid-feedback">Este campo no puede estar vacio</div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                         
                    </div>
                    <div class="col-md-4 mb-3">
                         <label for="validationCustom03">Fecha Vencimiento</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">date_range</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="fecha_vencimiento" id="validationCustom03" placeholder="Fecha Vencimiento" required>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
               </div>
               <div class="form-row">
                    <div class="col-md-4 mb-3">
                         <label for="validationCustomUsername">Monto Total </label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">attach_money</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="monto_total" id="validationCustomUsername" placeholder="Monto Total" aria-describedby="inputGroupPrepend" required>
                             <div class="input-group-append">
                                <span class="input-group-text">MN</span>
                             </div>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
                    <div class="col-md-4 mb-3">
                         <label for="validationCustomUsername">Monto Abono</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">attach_money</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="monto_abono" id="validationCustomUsername" placeholder="Monto Abono" aria-describedby="inputGroupPrepend" required>
                             <div class="input-group-append">
                                <span class="input-group-text">MN</span>
                             </div>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
                    <div class="col-md-4 mb-3">
                         <label for="validationCustomUsername">Monto a Liquidar </label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">attach_money</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="monto_liquidar" id="validationCustomUsername" placeholder="Monto a Liquidar" aria-describedby="inputGroupPrepend" required>
                             <div class="input-group-append">
                                <span class="input-group-text">MN</span>
                             </div>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
               </div>
               <!--****************************************************************-->
               
               <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="validationCustomUsername">ID Producto</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend">
                                <i class="material-icons">loyalty</i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="id_producto" id="validationCustomUsername" placeholder="ID Producto"  aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">Este campo no puede estar vacio</div>
                        </div>
                    </div>
                    <div class="col-md-1 mb-3">
                        
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationCustomUsername">Cantidad de productos</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend">
                                <i class="material-icons">loyalty</i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="cantidad" id="validationCustomUsername" placeholder="Cantidad"  aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">Este campo no puede estar vacio</div>
                        </div>
                    </div>
               </div>
<!--
               <div class="form-group">
                 <div class="custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="invalidCheck33" required>
                   <label class="custom-control-label" for="invalidCheck33">Agree to terms and conditions</label>
                   <div class="invalid-feedback">
                     You must agree before submitting.
                   </div>
                 </div>
                 <div class="invalid-feedback">
                   You must agree before submitting.
                 </div>
               </div>
             -->
               <button type="submit" class="btn btn-primary btn-sm " name="nuevo_apartado">Guardar</button>
               <a href="../apartados.php" class="btn btn-sm btn-danger">Regresar</a>
            </form>
        </div>
      </div>
    </article>











<?php
    $data_=$sitio->obtenerTemporal();
?>

    <article class="cuerpo" >
      <div class="contenido-tablas">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>Productos</th>
              <th>Marca</th>
              <th>Cantidad</th>
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
              </tr>
            </tbody>
          <?php endfor; ?>
        </table>
      </div>






<!--
        <div class="table-wrapper">
            <div class="clearfix">
            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
            <ul class="pagination">
            <li class="page-item disabled"><a href="#">Previous</a></li>
            <li class="page-item"><a href="#" class="page-link">1</a></li>
            <li class="page-item"><a href="#" class="page-link">2</a></li>
            <li class="page-item active"><a href="#" class="page-link">3</a></li>
            <li class="page-item"><a href="#" class="page-link">4</a></li>
            <li class="page-item"><a href="#" class="page-link">5</a></li>
            <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
            </div>
        </div>

      -->
    </article>


    <script src="../js/validacion_forms.js"></script>

  </body>
</html>
