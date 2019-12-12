<?php
    include('../componentes/treze.class.php');

    if(isset($_GET['id_apartado'])){
        $id_apartado = $_GET['id_apartado'];
        if(is_numeric($id_apartado)){
            $parametros[':id_apartado']=$id_apartado;
            $sql="select * from apartados where id_apartado=:id_apartado";
            $datos=$sitio->queryArray($sql,$parametros);
        }
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
            <p id="titulo">Abonar Apartado</p>
          </div>
        </article>
    </section>
    <article class="cuerpo" >
      <div class="contenido-productos">
        <div class="card-productos">
            <form class="needs-validation" action="../validar_abono.php" method="post" novalidate>
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
                          <input type="text" class="form-control" value="<?php echo $datos[0]['nombre_cliente']; ?>" name="nombre_cliente" id="validationCustom01" placeholder="Nombre del Cliente" required readonly>
                          <div class="valid-feedback">Nombre correcto!</div>
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
                            <input type="text" class="form-control" value="<?php echo $datos[0]['fecha_apartado']; ?>" name="fecha_apartado" id="validationCustom03" placeholder="Fecha Apartado" required readonly>
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
                             <input type="text" class="form-control" value="<?php echo $datos[0]['fecha_vencimiento']; ?>" name="fecha_vencimiento" id="validationCustom03" placeholder="Fecha Vencimiento" required readonly>
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
                             <input type="text" class="form-control" value="<?php echo $datos[0]['monto_total']; ?>" name="monto_total" id="validationCustomUsername" placeholder="Monto Total" aria-describedby="inputGroupPrepend" required readonly>
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
                             <input type="text" class="form-control" value="<?php echo $datos[0]['monto_abono']; ?>" name="monto_abono" id="validationCustomUsername" placeholder="Monto Abono" aria-describedby="inputGroupPrepend" required readonly>
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
                             <input type="text" class="form-control" value="<?php echo $datos[0]['monto_liquidar']; ?>" name="monto_liquidar" id="validationCustomUsername" placeholder="Monto a Liquidar" aria-describedby="inputGroupPrepend" required readonly>
                             <div class="input-group-append">
                                <span class="input-group-text">MN</span>
                             </div>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
               </div>
               <!--****************************************************************-->
               
               <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustomUsername">ID Apartado</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupPrepend">
                                <i class="material-icons">loyalty</i>
                              </span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $id_apartado; ?>" name="id_apartado" id="validationCustomUsername" placeholder="ID Apartado"  aria-describedby="inputGroupPrepend" required readonly>
                            <div class="invalid-feedback">Este campo no puede estar vacio</div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                         <label for="validationCustomUsername">Monto Nuevo para abonar</label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                               <span class="input-group-text" id="inputGroupPrepend">
                                 <i class="material-icons">attach_money</i>
                               </span>
                             </div>
                             <input type="text" class="form-control" name="monto_abono_nuevo" id="validationCustomUsername" placeholder="Monto Abono" aria-describedby="inputGroupPrepend" required>
                             <div class="input-group-append">
                                <span class="input-group-text">MN</span>
                             </div>
                             <div class="invalid-feedback">Este campo no puede estar vacio</div>
                         </div>
                    </div>
               </div>
<!--             -->


               <button type="submit" class="btn btn-primary btn-sm " name="abonar_apartado">Abonar</button>
               <a href="../apartados.php" class="btn btn-sm btn-danger">Regresar</a>
            </form>
        </div>
      </div>
    </article>


    <script src="../js/validacion_forms.js"></script>

  </body>
</html>
