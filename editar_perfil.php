<?php
    include 'treze.php';

 ?>

 <script>document.getElementById("titulo").innerHTML = "Editar Perfil";</script>


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
