function validarIngreso(form){
	
	if (!validarUsuario(form.usuario))
		return false;
	if (!validarClave(form.clave))
		return false;
	return true;
}




function validarUsuario (usuario){
	
	if(usuario.value.length<9)
		{
			alert("ERROR: usuario invalido");
			return false;
		}
	else
		return true;
}

function validarClave (clave){
	
	if(clave.value.length<4)
		{
			alert("ERROR: clave invalida");
			return false;
		}
	else
		return true;
}