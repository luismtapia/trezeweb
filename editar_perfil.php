<?php

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
         <?php include 'componentes/menu_.html'; ?>
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
                     <h5 class="card-title">Card title</h5>
                     <div class="input-group separacion-abajo-arriba">
                       <div class="custom-file">
                         <input type="file" class="custom-file-input" id="archivo" aria-describedby="inputGroupFileAddon04">
                         <label class="custom-file-label" for="archivo">Elegir foto</label>
                       </div>
                       <div class="input-group-append">
                         <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Subir</button>
                       </div>
                     </div>

                     <form>
                         <div class="form-row">
                           <div class="input-group">
                               <div class="input-group-prepend">
                                 <span class="input-group-text">Nombre y apellidos</span>
                               </div>
                               <input type="text" aria-label="First name" class="form-control" placeholder="Nombre(s)">
                               <input type="text" aria-label="Last name" class="form-control is-invalid" placeholder="Apellido(s)">
                           </div>
                         </div>

                         <div class="form-row">
                           <div class="col-md-9 mb-3">
                             <label for="validationServerUsername">Correo</label>
                             <div class="input-group">
                               <div class="input-group-prepend">
                                 <span class="input-group-text" id="inputGroupPrepend3"> <i class="fas fa-envelope"></i> </span>
                               </div>
                               <input type="text" class="form-control is-valid" id="validationServerUsername" placeholder="Correo" aria-describedby="inputGroupPrepend3" required>
                               <div class="invalid-feedback">
                                 Please choose a username.
                               </div>
                             </div>
                           </div>
                         </div>
                         <div class="form-row">
                           <div class="col-md-6 mb-3">
                             <label for="validationServer03">Usuario</label>
                             <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
                             <div class="invalid-feedback">
                               Please provide a valid city.
                             </div>
                           </div>
                           <div class="col-md-3 mb-3">
                             <label for="validationServer04">State</label>
                             <input type="password" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
                             <div class="invalid-feedback text-muted ">
                               Please provide a valid state.
                             </div>
                           </div>
                           <div class="col-md-9 mb-3">
                             <form class="form-inline">
                               <div class="form-group">
                                 <label for="pass">Password</label>
                                 <input type="password" id="pass" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                                 <small id="passwordHelpInline" class="text-muted">
                                   Must be 8-20 characters long.
                                 </small>
                               </div>
                             </form>
                           </div>

                         </div>
                         <div class="form-group">
                           <div class="form-check">
                             <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                             <label class="form-check-label" for="invalidCheck3">
                               Agree to terms and conditions
                             </label>
                             <div class="valid-feedback">
                               You must agree before submitting.
                             </div>
                           </div>
                         </div>
                         <button class="btn btn-primary" type="submit">Submit form</button>
                     </form>




                 </div>
             </div>
         </article>
         
         <!-- Optional JavaScript -->
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
   </html>
