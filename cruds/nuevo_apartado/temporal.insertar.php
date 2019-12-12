<?php 
	include('../../componentes/treze.class.php');

    if(isset($_GET['id_producto'])){
    	$id_producto = $_GET['id_producto'];
    	if(is_numeric($id_producto)){
    		$parametros[':id_producto']=$id_producto;
    		$sql="select id_producto,producto,marca,precio_venta from productos where id_producto=:id_producto";
    		$resultado= $sitio->queryArray($sql,$parametros);
    		$sitio->insertarTemporal($resultado);
    		//print_r($resultado);die();
    		header('Location: seleccion.productos.php');

    	}
    }
 ?>