<?php
  include('../componentes/treze.class.php');

  if(isset($_GET['id_producto'])){
    	$id_producto=$_GET['id_producto'];
    	if(is_numeric($id_producto)){
      		$sitio->eliminarProducto($id_producto);
      		echo '<div class="alert alert-success" role="alert"> El Producto ha sido eliminado </div>';
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
        <p id="titulo">Productos Eliminar</p>
      </div>
    </article>
</section>
<article class="cuerpo">
    <div class="contenido-tablas">
      <div class="card-productos">
        <a href="../productos.php" class="btn btn-danger">Regresar</a>
      </div>
    </div>
</article>
