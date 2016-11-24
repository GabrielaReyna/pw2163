
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
<hr>
<?php
	//conecto al servidor
	$conexion = mysql_connect("localhost", "root", "");
	mysql_select_db("bd2163");
	$consulta = "select * from usuarios order by usuario";
	$resultado = mysql_query($consulta); //ejecuta la consulta
	$tabla = "<table border=1>";
	$tabla.="<tr>";
	$tabla.="<th>Usuario</th> <th>Nombre</th> <th>Clave</th> <th>Tipo</th>";
	$tabla.="</tr>";
	while($registro = mysql_fetch_array($resultado);){ //Mientras se pueda hacer la asignaciòn
		$tabla.="<tr>";
		$tabla.="<td>".$registro["usuario"]."</td>";
		$tabla.="<td>".$registro["nombre"]."</td>";
		$tabla.="<td>".$registro["clave"]."</td>";
		$tabla.="<td>".$registro["tipousuario"]."</td>";
		$tabla.="</tr>";
	}
	$tabla.="</table>";
	print $tabla;
	
?>
