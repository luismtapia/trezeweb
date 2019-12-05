<?php
    session_start();
  	class Treze{
    		var $conexion = null;
    		function __construct(){

    		}
    		function conexion(){
    			include('config.php');
    			$this->conexion = new PDO($sgbd.':host='.$bdhost.';dbname='.$bdname, $bdusuario, $bdcontrasena);
    		}

        function login($usuario,$contrasena){
          $this->conexion();
    			//$this->conexion->beginTransaction();
          $contrasena=md5($contrasena);
          try{
            $sql = 'SELECT * FROM usuarios WHERE usuario = :usuario';
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(':usuario', $usuario);
            $sentencia->execute();
            $fila = $sentencia->fetch();

            if ($fila['usuario']==$usuario && $fila['contrasena']==$contrasena) {
              echo "iguales";
              $_SESSION=$fila;
              $_SESSION['validado']=true;
            }else{
              echo "Credenciales incorrectas";
              $_SESSION['validado']=false;
            }


    			}catch(Exception $e){
    				  //$this->conexion->rollBack();
              echo $e;
    			}
        }

        function logout(){
    			session_destroy();
    			unset($_SESSION);
    			$_SESSION['validado']=false;
    		}

    		function registro($data){
    			$this->conexion($data);
    			$this->conexion->beginTransaction();
    			//$fecha = $this->fecha($data['dia'],$data['mes'],$data['anio']);
    			try{
      				$sql = 'INSERT INTO usuarios(usuario, email, contrasena) VALUES (:usuario, :email, :contrasena)';
              $sentencia = $this->conexion->prepare($sql);
      				$sentencia->bindParam(':usuario', $data['usuario']);

      				$sentencia->bindParam(':email', $data['email']);

      				$data['contrasena'] = md5($data['contrasena']);
      				$sentencia->bindParam(':contrasena', $data['contrasena']);
      				$sentencia->execute();
              //var_dump($sql);

      				$this->conexion->commit();
    			}catch(Exception $e){
    				  $this->conexion->rollBack();
    			}
    		}

        function fecha($dia, $mes, $anio){
    			$fecha = $anio.'-'.$mes.'-'.$dia;
    			return $fecha;
    		}

        function rol($id_usuario){
    			$this->conexion();
    			$contrasena=md5($contrasena);
    			$sql = 'SELECT r.rol FROM usuario_rol ur INNER JOIN rol r on r.id_rol = ur.id_rol
    			WHERE ur.id_usuario=:id_usuario';
    			$sentencia = $this->conexion->prepare($sql);
    			$sentencia->bindParam('id_usuario', $id_usuario);
    			$sentencia->execute();
    			$i=0;
    			$roles=array();
    			while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)) {
    				$roles[$i]['rol']=$fila['rol'];
    				$roles[$i]['id_rol']=$fila['id_rol'];
    				$i++;
    			}
    			return $roles;
    		}

    		function 	validar_rol($roles_permitidos){
      			$roles_usuario = $_SESSION['roles'];
      			$rol_valido=false;
      			foreach ($roles_usuario as $rol) {
      				if(in_array($rol['rol'],$roles_permitidos)){
      					$rol_valido=true;
      				}
      			}
    				if (!$rol_valido) {
    					header('Location: logout.php?code=1');
        		}
    		}

    		function privilegios($roles){
    			$this->conexion();
    			$sql = 'SELECT p.privilegio FROM privilegio p INNER JOIN rol_privilegio r on p.id_rol = r.id_rol
    			WHERE r.id_rol=:id_rol';
    			$i=0;
    			$privilegios=array();
    			foreach ($roles as $key => $rol) {
      			$sentencia = $this->conexion->prepare($sql);
      			$sentencia->bindParam('id_rol', $rol['id_rol']);
      			$sentencia->execute();
      			while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)) {
        			$privilegios[$i]['privilegio']=$fila['privilegio'];
        			$privilegios[$i]['id_privilegio']=$fila['id_privilegio'];
      				$i++;
      			}
    			}
    		}

        function mensaje($id){
    			$this->conexion();
    			$sql = 'SELECT id_mensaje,apodo,id_usuario FROM mensaje INNER JOIN persona ON mensaje.id_persona  WHERE id_mensaje=:id_mensaje';
    			$sentencia = $this->conexion->prepare($sql);
    			$sentencia->bindParam(':id_mensaje',$id);
    			$sentencia->execute();
    			$fila = $sentencia->fetch();
    			print_r($fila);
    			$this->mensaje($fila['id_mensaje']);
    		}

        function respuesta($id){
    			$this->conexion();
    			$sql = 'SELECT * FROM mensaje INNER JOIN persona ON mensaje.id_persona  WHERE id_respuesta=:id_respuesta';
    			$sentencia = $this->conexion->prepare($sql);
    			$sentencia->bindParam(':id_respuesta',$id);
    			$sentencia->execute();

    			while($fila = $sentencia->fetch()){;
      			$this->respuesta($fila['id_mensaje']);
      			print_r($fila);
      		}

    		}

        function queryArray($query,$parametros=array()){
      		$this->conexion();
      		$datos=array();
      		$statement = $this->conexion->prepare($query);
      		if(count($parametros)>0){
      			$etiquetas = array_keys($parametros);
      			for ($i=0; $i < count($etiquetas) ; $i++) {
      				$statement->bindParam($etiquetas[$i],$parametros[$etiquetas[$i]]);
      			}
      		}
      		$resultado = $statement->execute();
      		while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
              		array_push($datos, $fila);
      		}
      		return $datos;
      	}

        function obtenerProductos(){
    			 $this->conexion();
    			 $datos=array();
    			 $query="select * from productos";
    			 $statement=$this->conexion->prepare($query);
    			 $resultado=$statement->execute();
    			 while ($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
    			 	array_push($datos, $fila);
    			 }
    			 return $datos;
    		}

        function insertarProducto($data){
          $this->conexion();
    			$this->conexion->beginTransaction();
    			try{
            $sql="insert into productos (producto,descripcion,marca,cantidad,precio_compra,precio_venta,descuento,fecha_captura,id_usuario,id_categoria) values (:producto,:descripcion,:marca,:cantidad,:precio_compra,:precio_venta,:descuento,:fecha_captura,:id_usuario,:id_categoria)";
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->bindParam(":producto",$data['producto']);
            $sentencia->bindParam(":descripcion",$data['descripcion']);
            $sentencia->bindParam(":marca",$data['marca']);
            $sentencia->execute();
      			$this->conexion->commit();
    			}catch(Exception $e){
    				  $this->conexion->rollBack();
    			}
        }




        function obtenerCategorias(){
    			 $this->conexion();
    			 $datos=array();
    			 $query="select * from categorias";
    			 $statement=$this->conexion->prepare($query);
    			 $resultado=$statement->execute();
    			 while ($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
    			 	array_push($datos, $fila);
    			 }
    			 return $datos;
    		}

        function insertarCategoria($categoria){
          $this->conexion();
    			$this->conexion->beginTransaction();
    			try{
            $sql="insert into categorias (categoria) values (:categoria)";
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->bindParam(":categoria",$categoria);
            $sentencia->execute();
      			$this->conexion->commit();
    			}catch(Exception $e){
    				  $this->conexion->rollBack();
    			}
        }

        function eliminarCategoria($id_categoria){
          $this->conexion();
    			try{
            $sql="delete from categorias where id_categoria=:id_categoria";
        		$statement=$this->conexion->prepare($sql);
        		$statement->bindParam(":id_categoria",$id_categoria,PDO::PARAM_INT);
        		$statement->execute();
    			}catch(Exception $e){
    				  echo $e;
    			}
        }

        function actualizarCategoria($id_categoria,$categoria){
          $this->conexion();
    			try{
      			$sql="update categorias set categoria=:categoria where id_categoria=:id_categoria";
      			$statement=$this->conexion->prepare($sql);
      			$statement->bindParam(":categoria",$categoria);
      			$statement->bindParam(":id_categoria",$id_categoria);
      			$statement->execute();
    			}catch(Exception $e){
    				  echo $e;
    			}
        }

  	}
  	$sitio = new Treze;
?>
