<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
	function validaUsuario(){
		$u=GetSQLValueString($_POST["usuario"], "text");//Limpia 
		$c=GetSQLValueString($_POST["clave"], "text");//Limpieza con getSQLValueString
    $respuesta= false;
		$conexion = mysql_connect("localhost", "root", "");
		$consulta = sprintf("select*from usuarios where usuarios=%s and clave=%s limit 1", $u,$c);//%s porque es un String, si fuera int se pone %D
    $resultado= mysql_query($consulta);
    //Esperamos un solo resultado
    if(mysql_num_rows($resultado)==1){
        $respuesta=true;

    }
    $arregloJSON = array('respuesta'=> $respuesta);//Variable que lee javascript -> valor
    print json_encode($arregloJSON);

	}
	


	//menú principal
	$opc = $POST["opcion"];
	switch ($opc) {
		case 'valida':
			validaUsuario();
			break;
		
		default:
			# code...
			break;
	}


?>
