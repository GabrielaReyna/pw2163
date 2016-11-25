<?php 
	//Preguntar si los valores existen
	$oculto=""; //Inicializamos las variables
	$usuario="";
	$nombre="";
	$clave="";
	$tipo="";
	if(isset($_POST["txtOculto"])){//si trae valores
		$oculto = $_POST["txtOculto"];
		
	}
	if(isset($_POST["txtUsuario"])){//si trae valores
		$usuario = $_POST["txtUsuario"];
	}
	if(isset($_POST["txtNombre"])){//si trae valores
		$nombre = $_POST["txtNombre"];
	}
	if(isset($_POST["txtClave"])){//si trae valores
		$clave= $_POST["txtClave"];
	}
	if(isset($_POST["txtTipo"])){//si trae valores
		$tipo = $_POST["txtTipo"];
	}

	function guardaUsuario($usuario, $nombre, $clave, $tipo){
		//Conectarse al servidor MySQL
		
		$conexion = mysql_connect("localhost", "root", ""); //Servidor, usuario y pass
		//Seleccionamos la BD
		mysql_select_db("bd2163");
		$consulta = "insert into usuarios values('".$usuario."', '".$nombre."', '".$clave."', '".$tipo."')";
		//Ejecutamos la conslta
		mysql_query($consulta);
		//preguntamos si hubo enserciòn
		if(mysql_affected_rows() > 0){
			print "Registro guardado";
			print "<a href='ejemplo.php'>Regresar</a>";

		}else{
			print "No se pudo guardar el registro";
		}
	}	

	switch ($oculto){
		case 'guardaUsuario':
			guardaUsuario($usuario, $nombre, $clave, $tipo);
			break;
		
		default:
			
			break;
	}
 ?>