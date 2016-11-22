<?php 
	//Preguntar si los valores existen
	$oculto=""; //Inicializamos las variables
	$usuario="";
	$nombre="";
	$clave="";
	$tipo="";
	if(isset($_POST["txtOculto"])){//si trae valores
		$oculto = $_POST["txtOculto"];
		print "oculto";
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
 <h1>Alta de Usuarios</h1>
<form action="ejemplo.php" method="POST">
	<input type="hidden" name="txtOculto" value="guardaUsuario">
	<input type="text" name="txtUsuario" id="txtUsuario">
	<input type="text" name="txtUNombre" id="txtNombre">
	<input type="password" name="txtClave" id="txtClave">
	<select name="txtTipo" id="txtTipo">
		<option value="administrador">Administrador</option>
		<option value="invitado">Invitado</option>
		<option value="colado">Colado</option>

	</select> <br>
		<input type="submit" value="Enviar">
</form>
