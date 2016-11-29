var inicioUsuarios = function(){


	var validaUsuario = function(){
		//Extraer los datos de los input en el HTML
		var usuario= $("#txtUsuario").val();
		var clave = $("#txtClave").val();
		//Preparar los paràmetros para ajax

		var parametros = "opcion=valida"+
						"&usuario="+usuario+
						"&clave="+clave+
						"&id="+Math.random();
		

		//Validamos que no estèn vacìos
		if(usuario!=""&&clave!=""){
			//Hacemos la peticion remota
			$.ajax({
				cache:false,
				type:"POST",
				dataType:"json",
				url: "php/utilerias.php"
				datos:parametros;
				success: function(response){
					//Si todo sale bien
					if(response.respuesta ==  true){ //Si el usuario y pass están correctos
						$("#entradausuario").hide();
						$("nav").show();
					}else{
						alert("Datos incorrectos:(");
					}
				},
				error: function(xhr, ajaxOptions, throwError){
					//si todo sale mal
				}
			});
		}else{
			alert("Usuario y clave son obligatorios")
		}
		
		

		
		}
		$("#btnValidaUsuario").on("click", validaUsuario);
}
//evento inicial
$(document).on("ready", inicioUsuarios);
