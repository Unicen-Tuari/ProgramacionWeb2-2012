function ValidarUsuario(usuario) {

	if (usuario.value.length<4) {
		alert("Error. El nombre del usuario debe contener 4 caracteres como mínimo");
		return false;
	} else
		return true;
}

function ValidarPassword(password) {

	if (password.value.length<8) {
		alert("Error. La contraseña debe tener 8 caracteres como mínimo");
		return false;
	} else
		return true;
}

function ValidarIngreso(formulario) {
	var retcode = true;
	
	if (!ValidarUsuario(formulario.usuario))
		retcode = false;
	
	if (!ValidarPassword(formulario.contrasenia))
		retcode = false;
	
	if (!ValidarEmail(formulario.usuario))
		retcode = false;
	
	return retcode;
}

function ValidarEmail(mail) {
	if (mail.value.length<1) {
		alert("Error. Debe ingresar una dirección de correo valida");
		return false;
	} else
		return true;
}

function ValidarRazonSocialFormularioContacto(nombre) {
	if (nombre.value.length<1) {
		alert("Error. Debe ingresar Nombre o Razón Social");
		return false;
	} else
		return true;
}

function ValidarEmailFormularioContacto(mail) {
	return ValidarEmail(mail);
}

function ValidarFormularioContacto(formulario) {

	var retcode = true;
	
	if (!ValidarRazonSocialFormularioContacto(formulario.razonsocial))
		retcode = false;
	
	if (!ValidarEmailFormularioContacto(formulario.email))
		retcode = false;
		
	return retcode;
	
}

function ValidarAdmFormRubro(form){
	return true;
};

function ValidarAdmFormRubroNombre(nombre){
	return true;
};