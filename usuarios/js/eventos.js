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
				url: "php/utilerias.php",
				datos: parametros,
				success: function(response){
					//Si todo sale bien
					if(response.respuesta ==  true){ //Si el usuario y pass están correctos
						$("#entradaUsuario").hide("slow");
						$("nav").show("slow");
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
		var teclaClave = function(tecla){
			if(tecla.which == 13){ //Tecla enter 
				validaUsuario(); //funciòn que valida usuario
			}
		}
		var Alta = function(){
			$("h2").html("alta de usuarios");

			$("#artAltaUsuarios").show("slow");
			//Escondo todos los botones de alta usuario
			$("#artAltaUsuarios > button").hide();
			$("#btnGuardaUsuarios > button").show();

		}
		var teclaUsuario= function(tecla){
			if(tecla.which == 13){ //Tecla enter 
				var usuario= $("#txtUsuarioNombre").val();


				var parametros = "opcion=buscaUsuario"+
						"&usuario="+usuario+
						"&id="+Math.random();
		

				$.ajax({
				cache:false,
				type:"POST",
				dataType:"json",
				url: "php/utilerias.php",
				datos: parametros,
				success: function(response){
					//Si todo sale bien
					if(response.respuesta ==  true){ //Si el usuario y pass están correctos
						$("#txtNombre").val(response.nombre);
						$("#txtClaveNombre").val(response.clave);
						$("#txtTipo option:selected").text(response.tipo);
					}
				},
				error: function(xhr, ajaxOptions, throwError){
					//si todo sale mal
					console.log("error en el servidor");
				}
			});
		  }
		}
		var guardaUsuario= function(tecla){}


		//keypress: se ejecuta cada vez que presiono una tecla sobre el input
		$("#txtClave").on("keypress", teclaClave);
		$("#btnAlta").on("click", Alta);
		$("#btnBaja").on("click", Baja);
		$("#btnCambio").on("click", Cambio);
		$("#txtUsuarioNombre").on("keypress", teclaUsuario);
		$("#btnGuardaUsuario").on("click", guardaUsuario);

}

//evento inicial
$(document).on("ready",inicioUsuarios);
