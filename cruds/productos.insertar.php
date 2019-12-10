<?php
    include '../componentes/treze.class.php';
    if(isset($_POST['nuevo_producto'])){
      $data=$_POST;
      $data['id_usuario']=$_SESSION['id_usuario'];
      $sitio->insertarProducto($data);
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
            <p id="titulo">Nuevo Producto</p>
          </div>
        </article>
    </section>
    <article class="cuerpo" >
      <div class="contenido-productos">
        <div class="card-productos">
            <form class="needs-validation" action="productos.insertar.php" method="post" novalidate>
              <!--****************************************************************-->
               <div class="form-row">
                    <div class="col-md-5 mb-3">
                       <label for="validationCustom01">Nombre</label>
                       <div class="input-group">
                         <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroupPrepend">
                             <i class="material-icons">spellcheck</i>
                           </span>
                         </div>
                         <input type="text" class="form-control" name="producto" id="validationCustom01" placeholder="Nombre del producto" required>
                         <div class="valid-feedback">
                         Nombre correcto!
                         </div>

                       <div class="invalid-feedback">Este campo no puede estar vacio</div>
                     </div>
                    </div>

                    <div class="col-md-7 mb-3">
                        <label for="validationCustom02">Descripcion</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">
                                <i class="material-icons">description</i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="descripcion" id="validationCustom02" placeholder="Descripcion del producto" required>
                            <div class="valid-feedback">Descripcion correcta!</div>
                            <div class="invalid-feedback">Este campo no puede estar vacio</div>
                        </div>
                    </div>
               </div>
               <!--****************************************************************-->
               <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Cantidad</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend">
                                <i class="material-icons">dns</i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="cantidad" id="validationCustom03" placeholder="Cantidad en existencia" required>
                            <div class="invalid-feedback">Este campo no puede estar vacio</div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                         <label for="validationCustomUsername">Precio de compra</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">attach_money</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="precio_compra" id="validationCustomUsername" placeholder="Precio de compra" aria-describedby="inputGroupPrepend" required>
                             <div class="input-group-append">
                                <span class="input-group-text">MN</span>
                             </div>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
                    <div class="col-md-4 mb-3">
                         <label for="validationCustom03">Precio de venta</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">receipt</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="precio_venta" id="validationCustom03" placeholder="Precio de venta" required>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
               </div>
               <!--****************************************************************-->
               <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="validationCustomUsername">Marca</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend">
                                <i class="material-icons">loyalty</i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="marca" id="validationCustomUsername" placeholder="Marca del producto" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">Este campo no puede estar vacio</div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                         <label for="validationCustomUsername">Descuento</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">loyalty</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="descuento" id="validationCustomUsername" placeholder="Descuento directo" aria-describedby="inputGroupPrepend" required>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
                    <div class="col-md-3 mb-3">
                         <label for="validationCustom03">Fecha de captura</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">date_range</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="fecha_captura" value="<?php date_default_timezone_set('UTC'); echo date('Y-m-d'); ?>" id="validationCustom03" placeholder="Fecha de captura" required disabled>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
               </div>

               <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="validationCustomUsername">ID usuario</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend">
                                <i class="material-icons">loyalty</i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="id_usuario" id="validationCustomUsername" placeholder="Id usuario" value="<?php echo $_SESSION['id_usuario']?>" aria-describedby="inputGroupPrepend" required disabled>
                            <div class="invalid-feedback">Este campo no puede estar vacio</div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                         <label for="validationCustomUsername">ID categoria</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">loyalty</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="id_categoria" id="validationCustomUsername" placeholder="ID categoria" aria-describedby="inputGroupPrepend" required>
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
               <button type="submit" class="btn btn-primary btn-sm " name="nuevo_producto">Submit form</button>
               <a href="../productos.php" class="btn btn-sm btn-danger">Regresar</a>
            </form>
        </div>
      </div>
    </article>











<?php
    $data_categoria=$sitio->obtenerCategorias();
?>

    <article class="cuerpo" >
      <div class="contenido-tablas">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>CATEGORIAS</th>

            </tr>
          </thead>
          <?php for ($i=0; $i <count($data_categoria) ; $i++): ?>
            <tbody>
              <tr>
                <td></td>
                <td><?php echo $data_categoria[$i]['id_categoria']; ?> </td>
                <td><?php echo $data_categoria[$i]['categoria']; ?> </td>
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
