<?php
    include '../componentes/treze.class.php';
    if(isset($_POST['nuevo_producto'])){
      $data=$_POST;
      $data['id_usuario']=$_SESSION['id_usuario'];
      $data['id_categoria']=1;
      $sitio->actualizarProducto($data);
      print_r($data);
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
                         <input type="text" class="form-control" name="nombre" id="validationCustom01" placeholder="Nombre del producto" required>
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
                             <input type="text" class="form-control" name="precio_de_compra" id="validationCustomUsername" placeholder="Precio de compra" aria-describedby="inputGroupPrepend" required>
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
                             <input type="text" class="form-control" name="precio_de_venta" id="validationCustom03" placeholder="Precio de venta" required>
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
               <button type="submit" class="btn btn-primary btn-sm " name="nuevo_producto">Submit form</button>
               <a href="../productos.php" class="btn btn-sm btn-danger">Regresar</a>
            </form>
        </div>
      </div>
    </article>

    <script src="../js/validacion_forms.js"></script>
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
