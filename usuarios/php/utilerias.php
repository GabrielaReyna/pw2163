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

  function validaUsuario()
  {
    $respuesta = false;
    $usuario = GetSQLValueString($_POST["usuario"],"text"); //limpieza con el getsqlvaluestring
    $clave = GetSQLValueString($_POST["clave"],"text");     //limpieza con el getsqlvaluestring
    $conexion = mysql_connect("localhost", "root", "");
    mysql_select_db("bd2163");
    $consulta = sprintf("select usuario,clave from usuarios where usuario=%s and clave=%s limit 1",$usuario,$clave);  //%S S=por que viene string, si fuera int pusieramos %D
    $resultado = mysql_query($consulta);
    //esperamos un solo resultadol
    if(mysql_num_rows($resultado) == 1)
    {
      $respuesta = true;

    }
    $arregloJSON = array('respuesta' => $respuesta); //convertimos nuesrtra $respuesta a formato json 
    print json_encode($arregloJSON);
    
  }
//menu principal
  $opcion = $_POST["opcion"];
  switch ($opcion) {
    case 'valida':
      validaUsuario();
      break;
    
    default:
      # code...
      break;
  }





?>