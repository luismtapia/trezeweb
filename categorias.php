<?php
    include 'componentes/treze.class.php';
    $data=$sitio->obtenerCategorias();
    //print_r($data);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>|3 TREZE Categorias</title>
    <?php include 'componentes/header.php'; ?>



  </head>
  <body>
    <?php include 'componentes/menu.html'; ?>

    <section class="cuerpo">
        <article class="titulo">
          <div class="tarjeta-titulo">
            <p id="titulo">Categorias</p>
          </div>
        </article>
    </section>
    <article class="cuerpo" >
      <div class="contenido-tablas">
        <div class="titulo-tabla">
            <div class="row">
                <div class="col-sm-6">
                    <h2>CRUD <b>Categorias</b></h2>
                </div>
                <div class="">
                    <a href="cruds/categorias.insertar.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> Nuevo</a>
                    <a href="#" class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>Otro</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th></th>
              <th>CATEGORIAS</th>
              <th></th>
              <th></th>
              <th></th>
              <th>actions</th>

            </tr>
          </thead>
          <?php for ($i=0; $i <count($data) ; $i++): ?>
            <tbody>
              <tr>
                <td></td>
                <td><?php echo $data[$i]['categoria']; ?> </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="cruds/categorias.actualizar.php?id_categoria=<?php echo $data[$i]['id_categoria'];?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="cruds/categorias.eliminar.php?id_categoria=<?php echo $data[$i]['id_categoria'];?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
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

    <script src="js/validacion_forms.js"></script>
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
