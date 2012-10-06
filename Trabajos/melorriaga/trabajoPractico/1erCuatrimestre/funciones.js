function validarIngreso() {
	var usuario = document.getElementById('usuario').value;
	var password = document.getElementById('password').value;
	if (usuario.length != 0 && password.length != 0) {
		return true;
	} else {
		alert('Los campos no pueden estar vacios');
		event.preventDefault();
		return false;
	}
}

function validarConsulta() {
	var nombre = document.getElementById('nombre').value;
	var mail = document.getElementById('mail').value;
	var consulta = document.getElementById('consulta').value;
	if (nombre.length != 0 && mail.length != 0 && consulta.length != 0) {
		return true;
	} else {
		alert('Los campos no pueden estar vacios');
		event.preventDefault();
		return false;
	}
}

function validarRegistro() {
	var newUser = document.getElementById('newUser').value;
	var newPass = document.getElementById('newPass').value;
	if (newUser.length != 0 && newPass.length != 0) {
		alert('Gracias! Ya puede iniciar sesion');
		return true;
	} else {
		alert('Los campos no pueden estar vacios');
		event.preventDefault();
		return false;
	}
}