<?php
    include('../componentes/treze.class.php');

    if(isset($_GET['id_producto'])){
    	$id_producto = $_GET['id_producto'];
    	if(is_numeric($id_producto)){
    		if(isset($_POST['actualizar'])){
          $data=$_POST;
    			$sitio->actualizarProducto($id_producto,$data);
          //print_r($data);
    			echo '<div class="alert alert-success" role="alert"> El Producto ha sido actualizado </div>';
    		}
        //actualizar la pagina con los datos
    		$parametros[':id_producto']=$id_producto;
    		$old_valor= $sitio->queryArray("select * from productos where id_producto=:id_producto",$parametros);

    	}
    }
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <?php include('../componentes/header.php'); ?>
    <link rel="stylesheet" href="../css/treze.css">
    <title>Actualizar Producto</title>
  </head>
  <body>

    <section class="cuerpo">
        <article class="titulo">
          <div class="tarjeta-titulo">
            <p id="titulo">Actualizar Producto</p>
          </div>
        </article>
    </section>
    <article class="cuerpo" >
      <div class="contenido-productos">
        <div class="card-productos">
            <form class="needs-validation" action="productos.actualizar.php?id_producto=<?php echo $id_producto;?>" method="post" novalidate>
              <!--****************************************************************-->
               <div class="form-row">
                    <div class="col-md-5 mb-3">
                       <label for="validationCustom01">Nombre del producto</label>
                       <div class="input-group">
                         <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroupPrepend">
                             <i class="material-icons">spellcheck</i>
                           </span>
                         </div>
                         <input type="text" class="form-control" name="producto" id="validationCustom01" placeholder="Nombre del producto" value="<?php echo $old_valor[0]['producto'] ?>" required>
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
                            <input type="text" class="form-control" name="descripcion" id="validationCustom02" placeholder="Descripcion del producto" value="<?php echo $old_valor[0]['descripcion'] ?>" required>
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
                            <input type="text" class="form-control" name="cantidad" id="validationCustom03" placeholder="Cantidad en existencia" value="<?php echo $old_valor[0]['cantidad'] ?>" required>
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
                             <input type="text" class="form-control" name="precio_compra" id="validationCustomUsername" placeholder="Precio de compra" value="<?php echo $old_valor[0]['precio_compra'] ?>" aria-describedby="inputGroupPrepend" required>
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
                             <input type="text" class="form-control" name="precio_venta" id="validationCustom03" placeholder="Precio de venta" value="<?php echo $old_valor[0]['precio_venta'] ?>" required>
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
                            <input type="text" class="form-control" name="marca" id="validationCustomUsername" placeholder="Marca del producto" value="<?php echo $old_valor[0]['marca'] ?>" aria-describedby="inputGroupPrepend" required>
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
                             <input type="text" class="form-control" name="descuento" id="validationCustomUsername" placeholder="Descuento directo" value="<?php echo $old_valor[0]['descuento'] ?>" aria-describedby="inputGroupPrepend" required>
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
                             <input type="text" class="form-control" name="fecha_captura" value="<?php echo $old_valor[0]['fecha_captura'] ?>" id="validationCustom03" placeholder="Fecha de captura" required disabled>
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
                            <input type="text" class="form-control" name="id_usuario" id="validationCustomUsername" placeholder="Id usuario" value="<?php echo $old_valor[0]['id_usuario'] ?>" aria-describedby="inputGroupPrepend" required disabled>
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
                             <input type="text" class="form-control" name="id_categoria" id="validationCustomUsername" placeholder="ID categoria" value="<?php echo $old_valor[0]['id_categoria'] ?>" aria-describedby="inputGroupPrepend" required>
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
               <button type="submit" class="btn btn-primary btn-sm " name="actualizar">Actualizar</button>
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
