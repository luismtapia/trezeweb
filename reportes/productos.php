<?php 
	ob_start();
	include('../componentes/treze.class.php');
  $data=$sitio->obtenerProductos();
  //print_r($data);die();
  
	require __DIR__.'/../vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf();
 ?>




<page backtop="5mm" backbottom="5mm" backleft="10mm" backright="10mm">
    <h3 align="left">|3 TREZE</h3>
    <h1 align="center">Reporte todos Productos</h1>

    <div class="cuerpo" >
      <div class="contenido-tablas">
        <table class="table border='1'">
          <thead>
            <tr>
              
              <th>ID</th>
              <th>Producto</th>
              <th>Descripcion </th>
              <th>Marca </th>
              <th>Cantidad</th>
              <th>Precio </th>
              <th>Descuento</th>
              
            </tr>
          </thead>
          <?php for ($i=0; $i <count($data) ; $i++): ?>
            <tbody>
              <tr>
                <td><?php echo $data[$i]['id_producto'] ?></td>
                <td><?php echo $data[$i]['producto']; ?> </td>
                <td><?php echo $data[$i]['descripcion']; ?></td>
                <td><?php echo $data[$i]['marca']; ?></td>
                <td><?php echo $data[$i]['cantidad']; ?></td>
                <td><?php echo $data[$i]['precio_venta']; ?> </td>
                <td><?php echo $data[$i]['descuento']; ?> </td>
              </tr>
            </tbody>

          <?php endfor; ?>
        </table>
      </div>
    </div>
    
    <page_footer>
        <img src="../imagenes/tux.png" alt="" height="100" width="100">
    </page_footer>
</page>


<?php
	$content = ob_get_clean();
	$html2pdf->writeHTML($content);
	$html2pdf->output("reporte_apartados.pdf");
?>