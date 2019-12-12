<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

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
          $contrasena=md5($contrasena);
              $sql = 'SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena= :contrasena';
              $sentencia = $this->conexion->prepare($sql);
              $sentencia->bindParam(':usuario', $usuario);
              $sentencia->bindParam(':contrasena', $contrasena);
              $sentencia->execute();
              $fila = $sentencia->fetch(PDO::FETCH_ASSOC);

              if (isset($fila['usuario'])) {
                  $_SESSION=$fila;
                  $_SESSION['validado']=true;
                  $_SESSION['roles'] = $this->rol($fila['id_usuario']);
                  $_SESSION['privilegios'] = $this->privilegios($_SESSION['roles']);
                  //var_dump($_SESSION);
                  header('Location: ../index.php');
              }else{
                  //$this->logout();
                  header('Location: logout.php?code=0');
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
                  $this->conexion->commit();

              $sql = 'SELECT * FROM usuarios WHERE email = :email';
              $sentencia = $this->conexion->prepare($sql);
              $sentencia->bindParam(':email', $data['email']);
              $sentencia->execute();
              $fila = $sentencia->fetch();


              $rol = 2;
                $sql = 'INSERT INTO roles_usuarios(id_rol, id_usuario) VALUES (:id_rol, :id_usuario)';
                $sentencia = $this->conexion->prepare($sql);
                $sentencia->bindParam(':id_rol', $rol);
                $sentencia->bindParam(':id_usuario', $fila['id_usuario']);
                $sentencia->execute();


              $this->correoBienvenida($data['email'],'Bienvennido al Sistema TREZE',' |3 TREZE Nuevo Usuario',$data['usuario']);
      				
    			}catch(Exception $e){
    				  $this->conexion->rollBack();
    			}
    		}

        function correoBienvenida($destino, $mensaje, $asunto, $nombre){
            // Load Composer's autoloader
            require '../vendor/autoload.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->SMTPDebug = SMTP::DEBUG_OFF;
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = '14030637@itcelaya.edu.mx';                     // SMTP username
                $mail->Password   = 'Nair1995';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('14030637@itcelaya.edu.mx', 'Miroslava');
                $mail->addAddress($destino, $nombre);     // Add a recipient
                $mail->addAddress('14030637@itcelaya.edu.mx');               // Name is optional
                $mail->addReplyTo('14030637@itcelaya.edu.mx', 'miroslava');
                //$mail->addBCC('bcc@example.com');

                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $asunto;
                $mail->Body    = $mensaje;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                header('Location: login.php');
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                header('Location: logout.php');
            }
        }

        function editar_perfil($data){
            if($_FILES['foto']['error']==0){
                $permitidos= array('image/png','image/jpeg','image/gif');
                if(in_array($_FILES['foto']['type'],$permitidos)){
                        if($_FILES['foto']['size']<=512000){
                            $tipo=explode("/",$_FILES['foto']['type']);
                            $archivo=$data['id_usuario'].'_'.md5(rand(0,1000000000)).".".$tipo[1];
                            $origen=$_FILES['foto']['tmp_name'];
                            //$destino='/var/www/html/treze/chatLS/uploads/'.$archivo;
                            $destino='imagenes/uploads/'.$archivo;
                            if(move_uploaded_file($origen,$destino)){
                                $this->conexion();
                                $this->conexion->beginTransaction();
                                try {
                                  $fp = fopen($destino, 'rb');

                                    $sql="UPDATE usuarios
                                    SET usuario=:usuario, email=:email,contrasena=:contrasena,foto = :foto, foto2=:foto2 where id_usuario=:id_usuario";
                                    $sentencia=$this->conexion->prepare($sql);
                                    $contrasena=md5($data['contrasena']);
                                    $sentencia->bindParam(':usuario', $data['usuario']);
                                    $sentencia->bindParam(':email', $data['email']);
                                    $sentencia->bindParam(':contrasena',$contrasena);
                                    $sentencia->bindParam(':foto2',$fp,PDO::PARAM_LOB);
                                    $sentencia->bindParam(':foto',$archivo);
                                    $sentencia->bindParam(':id_usuario',$data['id_usuario']);
                                    $sentencia->execute();

                                   $this->conexion->commit();
                                   header('Location: index.php');
                                } catch (Exception $e) {
                                    $this->conexion->rollback();
                                }
                            }
                            else
                                header('Location: editar_perfil.php');
                        }else header('Location: componentes/excede.php');
                }else header('Location: componentes/tipo.php');
            }else
                header('Location: administrador.php');
        }

        function rol($id_usuario){
    			$this->conexion();
    			$sql = 'SELECT rol, id_rol FROM roles_usuarios INNER JOIN roles using(id_rol) where id_usuario = :id_usuario';
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
          //var_dump($roles);
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
    					header('Location: componentes/logout.php?code=1');
        		}
    		}

    		function privilegios($roles){
    			$this->conexion();
          $sql = 'SELECT p.privilegio,p.id_privilegio FROM privilegios p inner join roles_privilegios r on p.id_privilegio = r.id_privilegio where r.id_rol = :id_rol';
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
          return $privilegios;
    		}

/*
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

    		}*/


//***********************************************querys

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
            $sql="insert into productos (producto,descripcion,marca,cantidad,precio_compra,precio_venta,descuento,fecha_captura,id_usuario,id_categoria) values (:producto,:descripcion,:marca,:cantidad,:precio_compra,:precio_venta,:descuento,CURDATE(),:id_usuario,:id_categoria)";
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->bindParam(":producto",$data['producto']);
            $sentencia->bindParam(":descripcion",$data['descripcion']);
            $sentencia->bindParam(":marca",$data['marca']);
            $sentencia->bindParam(":cantidad",$data['cantidad']);
            $sentencia->bindParam(":precio_compra",$data['precio_compra']);
            $sentencia->bindParam(":precio_venta",$data['precio_venta']);
            $sentencia->bindParam(":descuento",$data['descuento']);
            //$sentencia->bindParam(":fecha_captura",$data['fecha_captura']);
            $sentencia->bindParam(":id_usuario",$data['id_usuario']);
            $sentencia->bindParam(":id_categoria",$data['id_categoria']);

            $sentencia->execute();
      			$this->conexion->commit();
    			}catch(Exception $e){
    				  $this->conexion->rollBack();
    			}
        }

        function eliminarProducto($id_producto){
          $this->conexion();
    			try{
            $sql="delete from productos where id_producto=:id_producto";
        		$statement=$this->conexion->prepare($sql);
        		$statement->bindParam(":id_producto",$id_producto,PDO::PARAM_INT);
        		$statement->execute();
    			}catch(Exception $e){
    				  echo $e;
    			}
        }

        function actualizarProducto($id_producto,$data){
          $this->conexion();
          try{
            $sql="update productos set producto=:producto, descripcion=:descripcion, marca=:marca, cantidad=:cantidad, precio_compra=:precio_compra, precio_venta=:precio_venta, descuento=:descuento, fecha_captura=:fecha_captura, id_categoria=:id_categoria where id_producto=:id_producto";
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->bindParam(":producto",$data['producto']);
            $sentencia->bindParam(":descripcion",$data['descripcion']);
            $sentencia->bindParam(":marca",$data['marca']);
            $sentencia->bindParam(":cantidad",$data['cantidad']);
            $sentencia->bindParam(":precio_compra",$data['precio_compra']);
            $sentencia->bindParam(":precio_venta",$data['precio_venta']);
            $sentencia->bindParam(":descuento",$data['descuento']);
            $sentencia->bindParam(":fecha_captura",$data['fecha_captura']);
            //$sentencia->bindParam(":id_usuario",$data['id_usuario']);
            $sentencia->bindParam(":id_categoria",$data['id_categoria']);
            $sentencia->bindParam(":id_producto",$id_producto);
            $sentencia->execute();
          }catch(Exception $e){
              echo $e;
          }
        }

//*****************CATEGORIAS

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

//********************APARTADOS
        function obtenerApartados(){
           $this->conexion();
           $datos=array();
           $query="select * from apartados";
           $statement=$this->conexion->prepare($query);
           $resultado=$statement->execute();
           while ($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($datos, $fila);
           }
           return $datos;
        }

        function insertarApartado($data){
          $this->conexion();
          $this->conexion->beginTransaction();
          try{
            $sql="insert into apartados (nombre_cliente, CURDATE(), fecha_vencimiento, monto_total, monto_abono, monto_liquidar) values (:nombre_cliente,:fecha_apartado,:fecha_vencimiento,:monto_total,:monto_abono,:monto_liquidar,";
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->bindParam(":producto",$data['producto']);
            $sentencia->bindParam(":descripcion",$data['descripcion']);
            $sentencia->bindParam(":marca",$data['marca']);
            $sentencia->bindParam(":cantidad",$data['cantidad']);
            $sentencia->bindParam(":precio_compra",$data['precio_compra']);
            $sentencia->bindParam(":precio_venta",$data['precio_venta']);
            $sentencia->bindParam(":descuento",$data['descuento']);
            //$sentencia->bindParam(":fecha_captura",$data['fecha_captura']);
            $sentencia->bindParam(":id_usuario",$data['id_usuario']);
            $sentencia->bindParam(":id_categoria",$data['id_categoria']);

            $sentencia->execute();
            $this->conexion->commit();
          }catch(Exception $e){
              $this->conexion->rollBack();
          }
        }

//********************no ocupo
        function eliminarApartado($id_apartado){
          $this->conexion();
          try{
            $sql="delete from apartados where id_apartado=:id_apartado";
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":id_apartado",$id_apartado,PDO::PARAM_INT);
            $statement->execute();
          }catch(Exception $e){
              echo $e;
          }
        }

        function actualizarApartado($id_apartado,$data){
          $this->conexion();
          try{
            $sql="update productos set producto=:producto, descripcion=:descripcion, marca=:marca, cantidad=:cantidad, precio_compra=:precio_compra, precio_venta=:precio_venta, descuento=:descuento, fecha_captura=:fecha_captura, id_categoria=:id_categoria where id_apartado=:id_apartado";
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->bindParam(":producto",$data['producto']);
            $sentencia->bindParam(":descripcion",$data['descripcion']);
            $sentencia->bindParam(":marca",$data['marca']);
            $sentencia->bindParam(":cantidad",$data['cantidad']);
            $sentencia->bindParam(":precio_compra",$data['precio_compra']);
            $sentencia->bindParam(":precio_venta",$data['precio_venta']);
            $sentencia->bindParam(":descuento",$data['descuento']);
            $sentencia->bindParam(":fecha_captura",$data['fecha_captura']);
            //$sentencia->bindParam(":id_usuario",$data['id_usuario']);
            $sentencia->bindParam(":id_categoria",$data['id_categoria']);
            $sentencia->bindParam(":id_apartado",$id_apartado);
            $sentencia->execute();
          }catch(Exception $e){
              echo $e;
          }
        }
//////*****************no ocupa

        function actualizarAbonoApartado($id_apartado,$NUEVO_MONTO_ABONO,$NUEVO_MONTO_LIQUIDAR){
          $this->conexion();
          try{
            $sql="update apartados set monto_abono=:monto_abono, monto_liquidar=:monto_liquidar where id_apartado=:id_apartado";
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->bindParam(":monto_abono",$NUEVO_MONTO_ABONO);
            $sentencia->bindParam(":monto_liquidar",$NUEVO_MONTO_LIQUIDAR);
            $sentencia->bindParam(":id_apartado",$id_apartado);
            $sentencia->execute();
          }catch(Exception $e){
              echo $e;
          }
        }

        function busqueda($busqueda){
            $this->conexion();
            $busqueda.= "%"; 
            $sql = "SELECT * FROM productos WHERE producto LIKE :busqueda"; 
            
            $sentencia = $this->conexion->prepare($sql); 
            $sentencia->bindParam(':busqueda', $busqueda, PDO::PARAM_STR); 
            $sentencia->execute(); 
            $datos = $sentencia->fetchAll();
           return $datos;
        }

//*********************************************************Nuevo apartado
        function iniciarTemporal(){
          $this->conexion();
          try{
            $sql="DROP TABLE IF EXIST temporal";
            $statement=$this->conexion->prepare($sql);
            $statement->execute();

            $sql="CREATE TABLE temporal (id_producto int, producto varchar(100), marca varchar(50), cantidad int, precio decimal, total int)";
            $statement=$this->conexion->prepare($sql);
            $statement->execute();
          }catch(Exception $e){
              echo $e;
          }
        }

        function terminarTemporal(){
          $this->conexion();
          try{
            $sql="DROP TABLE temporal";
            $statement=$this->conexion->prepare($sql);
            $statement->execute();
          }catch(Exception $e){
              echo $e;
          }
        }
        
        function obtenerTemporal(){
           $this->conexion();
           $datos=array();
           $query="select * from temporal";
           $statement=$this->conexion->prepare($query);
           $resultado=$statement->execute();
           while ($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($datos, $fila);
           }
           return $datos;
        }

        function insertarTemporal($data){
          $this->conexion();
          $unidad=1;
          $this->conexion->beginTransaction();
          try{
            $sql="insert into temporal (id_producto, producto, marca, cantidad, precio, total) values (:id_producto,:producto,:marca,:cantidad,:precio,:total)";
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->bindParam(":id_producto",$data[0]['id_producto']);
            $sentencia->bindParam(":producto",$data[0]['producto']);
            $sentencia->bindParam(":marca",$data[0]['marca']);
            $sentencia->bindParam(":cantidad",$unidad);
            $sentencia->bindParam(":precio",$data[0]['precio_venta']);
            $sentencia->bindParam(":total",$data[0]['precio_venta']);

            $sentencia->execute();
            $this->conexion->commit();
          }catch(Exception $e){
              $this->conexion->rollBack();
          }
        }

  	}
  	$sitio = new Treze;
?>
