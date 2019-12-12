<?php
    include 'componentes/treze.class.php';

    //$sitio->validar_rol(array('Usuario','Administrador'));
    //$id_usuario = $_SESSION['id_usuario'];
    
    if (isset($_POST['actualizar'])) {
        $datos = $_POST;
        //$datos['id_usuario'] = $id_usuario;
        $sitio->editar_perfil($datos);
        print_r($datos);
        die();
    }
    $data=$_SESSION;
    
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>TREZE</title>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css'>

     <link rel="stylesheet" href="css/redes_sociales.css">
     <link rel="stylesheet" href="css/menu.css">
     <link rel="stylesheet" href="css/treze.css">

   </head>
   <body>
         <?php include 'componentes/menu.html'; ?>
         <section class="cuerpo">
             <article class="titulo">
               <div class="tarjeta-titulo">
                 <p id="titulo">Inicio</p>
               </div>
             </article>
         </section>


         <article class="contenido-perfil">
            <div class="card caja">
                 <div class="card-header">
                     Mis datos
                 </div>
                 <div class="card-body">
                       <h5 class="card-title"><?php echo $data['id_usuario']; ?></h5>

                       <form class="needs-validation" action="editar_perfil.php" method="post" enctype="multipart/form-data" novalidate>
                         <!--****************************************************************-->
                        <!--
                          <div class="form-row">
                               <div class="col mb-3">
                                  <label for="nombre">Nombre(s) y Apellido(s)</label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="material-icons">person</i> </span>
                                      </div>
                                      <input type="text" name="nombre" class="form-control" placeholder="Nombre(s)" required>
                                      <input type="text" name="apellidos" class="form-control" placeholder="Apellido(s)" required>
                                      <div class="invalid-feedback">Este campo no puede estar vacio</div>
                                  </div>
                               </div>
                          </div>
                          -->
                          <!--****************************************************************-->
                          <div class="form-row">
                               <div class="col mb-3">
                                   <label for="usuario">Usuario</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                         <span class="input-group-text" id="inputGroupPrepend">
                                           <i class="material-icons">person</i>
                                         </span>
                                       </div>
                                       <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $data['usuario']; ?>" placeholder="Usuario" aria-describedby="inputGroupPrepend" required>
                                       <div class="invalid-feedback">Este campo no puede estar vacio</div>
                                   </div>
                               </div>
                          </div>

                          <!--****************************************************************-->
                          <div class="form-row">
                               <div class="col mb-3">
                                   <label for="correo">Correo electronico</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                         <span class="input-group-text" id="inputGroupPrepend">
                                           <i class="material-icons">mail</i>
                                         </span>
                                       </div>
                                       <input type="text" class="form-control" name="correo" id="correo" value="<?php echo $data['email']; ?>" placeholder="Correo electronico" required>
                                       <div class="invalid-feedback">Este campo no puede estar vacio</div>
                                   </div>
                               </div>
                          </div>

                          <!--****************************************************************-->
                          <div class="form-row">
                               <div class="col mb-3">
                                   <label for="contrasena">Contraseña</label>
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                         <span class="input-group-text" id="inputGroupPrepend">
                                           <i class="material-icons">lock</i>
                                         </span>
                                       </div>
                                       <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                                       <div class="invalid-feedback">Este campo no puede estar vacio</div>
                                   </div>
                               </div>
                          </div>

                          <!--****************************************************************-->
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="">Foto de perfil</label>
                                <input type="file" class="form-control-file" name="archivo" id="archivo" >
                              </div>
                            </div>


                          </div>
                          <br>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="invalidCheck33" required>
                              <label class="custom-control-label" for="invalidCheck33">Acepto terminos y condiciones</label>
                              <div class="invalid-feedback">Debe aceptar los terminos y condiciones</div>
                            </div>
                          </div>
                          <button class="btn btn-primary btn-sm " name="actualizar" type="submit">Actualizar</button>
                       </form>
                 </div>
             </div>
         </article>

         <script src="js/validacion_forms.js"></script>
         <!-- Optional JavaScript -->
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
   </html>
