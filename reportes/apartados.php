<?php 
	ob_start();
	include('../componentes/treze.class.php');
  $data=$sitio->obtenerApartados();
  //print_r($data);die();
  
	require __DIR__.'/../vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf();
 ?>




<page backtop="5mm" backbottom="5mm" backleft="10mm" backright="10mm">
    <h3 align="left">|3 TREZE</h3>
    <h1 align="center">Reporte todos apartados</h1>

    <div class="cuerpo" >
      <div class="contenido-tablas">
        <table class="table border='1'">
          <thead>
            <tr>
              
              <th>ID</th>
              <th>Nombre cliente</th>
              <th>Fecha apartado </th>
              <th>Fecha vencimiento </th>
              <th>Monto total</th>
              <th>Abono </th>
              <th>Liquidacion </th>
              
            </tr>
          </thead>
          <?php for ($i=0; $i <count($data) ; $i++): ?>
            <tbody>
              <tr>
                <td><?php echo $data[$i]['id_apartado'] ?></td>
                <td><?php echo $data[$i]['nombre_cliente']; ?> </td>
                <td><?php echo $data[$i]['fecha_apartado']; ?></td>
                <td><?php echo $data[$i]['fecha_vencimiento']; ?></td>
                <td><?php echo $data[$i]['monto_total']; ?></td>
                <td><?php echo $data[$i]['monto_abono']; ?> </td>
                <td><?php echo $data[$i]['monto_liquidar']; ?> </td>
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