<?php 
	ob_start();
	include('../componentes/treze.class.php');
  	if(isset($_GET['id_apartado'])){
        $id_apartado = $_GET['id_apartado'];
        if(is_numeric($id_apartado)){
            $parametros[':id_apartado']=$id_apartado;
            //$sql="select p.producto,p.descripcion, p.marca,p.precio_venta,pa.cantidad from productos p INNER JOIN productos_apartados pa on p.id_producto=pa.id_producto where id_apartado=2";
            $sql="select p.producto,p.descripcion, p.marca,p.precio_venta,pa.cantidad, (p.precio_venta*pa.cantidad) as total from productos p INNER JOIN productos_apartados pa on p.id_producto=pa.id_producto where id_apartado=:id_apartado";
                $data = $sitio->queryArray($sql,$parametros);

            $sql="select * from apartados where id_apartado=:id_apartado";
            $los_apartados = $sitio->queryArray($sql,$parametros);

            $sql="select  sum(p.precio_venta*pa.cantidad) as total from productos p INNER JOIN productos_apartados pa on p.id_producto=pa.id_producto where id_apartado=:id_apartado";
            $suma = $sitio->queryArray($sql,$parametros);

        }
    }
    //print_r($data);die();
	require __DIR__.'/../vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf();
	//$html2pdf->addFont('Helvetica', 'B' );
 ?>




<page backtop="5mm" backbottom="5mm" backleft="10mm" backright="10mm">
    <h3 align="left">|3 TREZE</h3>
    <h1 align="center">Reporte apartados</h1>
    <div>
      <pre class="card-productos">
        <LABEL>ID: <?php echo $los_apartados[0]['id_apartado'] ?></LABEL>
        <LABEL>Cliente: <?php echo $los_apartados[0]['nombre_cliente'] ?></LABEL><br>
        <LABEL>Fecha Apartado: <?php echo $los_apartados[0]['fecha_apartado'] ?></LABEL>
        <LABEL>Fecha vencimiento: <?php echo $los_apartados[0]['fecha_vencimiento'] ?></LABEL><br>
        <LABEL>Monto total: <?php echo $los_apartados[0]['monto_total'] ?></LABEL>
        <LABEL>Monto abono: <?php echo $los_apartados[0]['monto_abono'] ?></LABEL>
        <LABEL>Monto a liquidar: <?php echo $los_apartados[0]['monto_liquidar'] ?></LABEL>
      </pre>
    </div>

    <div class="cuerpo" >
      <div class="contenido-tablas">
        <div class="titulo-tabla">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Detalles de <b>Apartado de <?php echo $los_apartados[0]['nombre_cliente'] ?></b></h2>
                </div>
            </div>
        </div>
        <table class="table border='1'">
          <thead>
            <tr>
              
              <th>Producto</th>
              <th>Descripcion</th>
              <th>Marca</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Total</th>
              
            </tr>
          </thead>
          <?php for ($i=0; $i <count($data) ; $i++): ?>
            <tbody>
              <tr>
                <td><?php echo $data[$i]['producto'] ?></td>
                <td><?php echo $data[$i]['descripcion']; ?> </td>
                <td><?php echo $data[$i]['marca']; ?></td>
                <td><?php echo $data[$i]['precio_venta']; ?></td>
                <td><?php echo $data[$i]['cantidad']; ?></td>
                <td><?php echo $data[$i]['total']; ?> </td>
              </tr>
            </tbody>

          <?php endfor; ?>
          <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total a pagar</td>
                <td><?php echo $suma[0]['total']; ?> </td>
              </tr>
          </tfoot>
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