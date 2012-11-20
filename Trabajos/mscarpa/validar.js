//----------------------VALIDO CARGAR INMUEBLE-------------------------------
function validarCargarInmueble(){
    
	//valido el nombre
    if (document.frmCargarInmueble.titulo.value.length == 0){
       alert("Tiene que escribir su titulo");
       document.frmCargarInmueble.titulo.focus();
       return 0;
    }
	
	if (document.frmCargarInmueble.descripcion.value.length == 0){
       alert("Tiene que escribir su descripcion");
       document.frmCargarInmueble.descripcion.focus();
       return 0;
    }
	
	 if (document.frmCargarInmueble.valor.value.length == 0){
       alert("Tiene que ingresar un valor");
       document.frmCargarInmueble.valor.focus();
       return 0;
    }
	
	if (parseInt(document.frmCargarInmueble.valor.value) < 0){
       alert("Tiene que ingresar un valor mayor a 0 (cero)");
       document.frmCargarInmueble.valor.focus();
       return 0;
    }
	
	if (isNaN(parseInt(document.frmCargarInmueble.valor.value))){
       alert("Tiene que ingresar un valor numerico");
       document.frmCargarInmueble.valor.focus();
       return 0;
    }
	
	//for (var i = 1; i <= 3; i++) {
	//}	
		if (document.frmCargarInmueble.foto1.value.length == 0){
		alert("Tiene que ingresar 3 fotos");
		document.frmCargarInmueble.foto1.focus();
		return 0;
		}
		if (document.frmCargarInmueble.foto2.value.length == 0){
		alert("Tiene que ingresar 3 fotos");
		document.frmCargarInmueble.foto2.focus();
		return 0;
		}
		if (document.frmCargarInmueble.foto3.value.length == 0){
		alert("Tiene que ingresar 3 fotos");
		document.frmCargarInmueble.foto3.focus();
		return 0;
		}
	
	
	
	
     extensiones = new Array(".png", ".jpg");
	 extension = (document.frmCargarInmueble.foto1.value.substring(document.frmCargarInmueble.foto1.value.lastIndexOf("."))).toLowerCase();	 
	 permitida = false; 
	  for (var i = 0; i < extensiones.length; i++) { 
		 if (extensiones[i] == extension) { 
		 permitida = true; 
		 break; 
		 } 
	  } 
	  
	  if(!permitida)
	  {
		alert("Tiene que ingresar una foto con extension valida png o jpg");
		document.frmCargarInmueble.descripcion.focus();
		return 0;
	  }
		  
    document.frmCargarInmueble.submit();
}

//----------------------VALIDO REGISTRARSE-------------------------------

function validarRegistrarse(){

		if (document.Registrarse.nombre.value.length == 0){
			   alert("Tiene que escribir su nombre");
			   document.Registrarse.nombre.focus();
			   return 0;
			}
		if (document.Registrarse.apellido.value.length == 0){
			   alert("Tiene que escribir su apellido");
			   document.Registrarse.apellido.focus();
			   return 0;
			}
		if (document.Registrarse.dni.value.length == 0){
			   alert("Tiene que escribir su DNI");
			   document.Registrarse.dni.focus();
			   return 0;
			}
				if (isNaN(parseInt(document.Registrarse.dni.value))){
					   alert("DNI debe ser un valor numerico");
					   document.Registrarse.dni.focus();
					   return 0;
					}
			
		if (document.Registrarse.fecha.value.length == 0){
			   alert("Tiene que escribir su Fecha de nacimiento");
			   document.Registrarse.fecha.focus();
			   return 0;
			}
								
		if (document.Registrarse.localidad.value.length == 0){
			   alert("Tiene que escribir su Localidad");
			   document.Registrarse.localidad.focus();
			   return 0;
			}
		if (document.Registrarse.direccion.value.length == 0){
			   alert("Tiene que escribir su Direccion");
			   document.Registrarse.direccion.focus();
			   return 0;
			}	
		if (document.Registrarse.usuario.value.length == 0){
			   alert("Tiene que escribir su Usuario");
			   document.Registrarse.usuario.focus();
			   return 0;
			}
		if (document.Registrarse.password.value.length == 0){
			   alert("Tiene que escribir su Password");
			   document.Registrarse.password.focus();
			   return 0;
			}	
}

//----------------------VALIDO CONTACTENOS-------------------------------

function validarContacto(){

		if (document.Contactenos.nombre.value.length == 0){
			   alert("Tiene que escribir su nombre");
			   document.Contactenos.nombre.focus();
			   return 0;
			}	
		if (document.Contactenos.apellido.value.length == 0){
			   alert("Tiene que escribir su apellido");
			   document.Contactenos.apellido.focus();
			   return 0;
			}	
		if (document.Contactenos.comentario.value.length == 0){
			   alert("Tiene que escribir su comentario");
			   document.Contactenos.comentario.focus();
			   return 0;
			}	
			
		alert("El envio fue correcto, en breve nos comunicaremos con unsted");
}

