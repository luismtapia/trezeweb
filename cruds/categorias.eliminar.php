<?php
  include('../componentes/treze.class.php');

  if(isset($_GET['id_categoria'])){
    	$id_categoria=$_GET['id_categoria'];
    	if(is_numeric($id_categoria)){

      		$sitio->eliminarCategoria($id_categoria);
      		echo '<div class="alert alert-success" role="alert"> La categoria ha sido eliminada </div>';
    	}
  }
?>

<?php
  include('../componentes/header.php');

?>
<link rel="stylesheet" href="../css/treze.css">

<section class="cuerpo">
    <article class="titulo">
      <div class="tarjeta-titulo">
        <p id="titulo">Categorias Eliminar</p>
      </div>
    </article>
</section>
<article class="cuerpo">
    <div class="contenido-tablas">
      <div class="card-productos">
        <a href="../categorias.php" class="btn btn-danger">Regresar</a>
      </div>
    </div>
</article>
