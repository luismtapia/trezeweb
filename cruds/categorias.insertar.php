<?php
  include('../componentes/treze.class.php');

  if(isset($_POST['enviar'])){
    $categoria= $_POST['categoria'];
    $sitio->insertarCategoria($categoria);
    echo '<div class="alert alert-success" role="alert"> Se ha insertado un nueva categoria </div>';;
  }
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <?php include('../componentes/header.php'); ?>
    <link rel="stylesheet" href="../css/treze.css">
    <title>Insertar Categoria</title>
  </head>
  <body>

    <section class="cuerpo">
        <article class="titulo">
          <div class="tarjeta-titulo">
            <p id="titulo">Insertar Categorias</p>
          </div>
        </article>
    </section>
    <article class="cuerpo">
      <div class="contenido-tablas">
        <div class="card-productos">
          <form action="categorias.insertar.php" method="post" class="needs-validation" novalidate>
            <div class="form-group">
              <label>Categoria</label>
              <input type="text" name="categoria" class="form-control" required>
              <div class="invalid-feedback">Este campo no puede estar vacio</div>
            </div>
            <div class="form-group">
              <input type="submit" name="enviar" value="GUARDAR" class="btn btn-success">
              <a href="../categorias.php" class="btn btn-danger">Regresar</a>
            </div>
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
