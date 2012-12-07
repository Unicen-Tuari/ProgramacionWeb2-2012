// JavaScript Document
function validarConsulta(){
	//var formulario = document.getElementById(form);
	nombre = document.getElementById("nombre");
	apellido = document.getElementById("apellido");
	dni = document.getElementById("dni");
	email = document.getElementById("email");
	consulta = document.getElementById("consulta");

	if (nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)) {
		alert('El campo \"Nombre\" no puede estar vacio');
		nombre.focus();
		return false;
	} 
	if (apellido.value == null || apellido.value.length == 0 || /^\s+$/.test(apellido.value)) {
		alert('El campo \"Apellido\" no puede estar vacio');
		apellido.focus();
		return false;
	}
	if (dni.value == null || dni.value.length == 0 || /^\s+$/.test(dni.value)) {
		alert('El campo \"DNI\" no puede estar vacio');
		dni.focus();
		return false;
	}
	if (email.value == null || email.value.length == 0 || /^\s+$/.test(email.value)) {
		alert('El campo \"Email\" no puede estar vacio');
		email.focus();
		return false;
	}
	if (consulta.value == null || consulta.value.length == 0 || /^\s+$/.test(consulta.value)) {
		alert('El campo \"Consulta\" no puede estar vacio');
		consulta.focus();
		return false;
	}
	return true;
}

function validarOrden(){
	//var formulario = document.getElementById(form);
	nroorden = document.getElementById("nroorden");
	contras = document.getElementById("contras");

	if (nroorden.value == null || nroorden.value.length == 0 || /^\s+$/.test(nroorden.value)) {
		alert('El \"Numero de orden\" no puede estar vacio');
		nroorden.focus();
		return false;
	} 
	if (contras.value == null || contras.value.length == 0 || /^\s+$/.test(contras.value)) {
		alert('El campo \"Contraseña\" no puede estar vacio');
		contras.focus();
		return false;
	}
	return true;
}