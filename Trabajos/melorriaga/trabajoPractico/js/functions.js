function setElementsHeights() {
	var total = $(window).height();
	var main = $('#main-wrapper').children().height(total - 215);
	$('#login').height(main.height() / 2 - 16);
		$('#botonLogin').css('margin-top', $('#login').height() - 138);
	$('#categories').height(main.height() / 2);
}

function presionarHome() {
	var url = $('#link1').attr('href');
	$('#link1').click(function(event) {
		event.preventDefault();
		$('#categories').empty();
		$('#content-wrapper').load(url);
	});
}

function presionarNovedades() {
	var url = $('#link2').attr('href');
	$('#link2').click(function(event) {
		event.preventDefault();
		$('#categories').empty();
		$('#content-wrapper').load(url);
	});
}

function presionarListado() {
	var url = $('#link3').attr('href');
	$('#link3').click(function(event) {
		event.preventDefault();
		$('#content-wrapper').empty();
		$('#categories').load('php/categorias.php');
		$(document).on('click', '.categoria a', presionarCategoria);
	});
}

function presionarCategoria(event) {
	event.preventDefault();
	var url = $(this).attr('href');
	$('#content-wrapper').load(url);
}

function presionarConsultas(event) {
	var url = $('#link4').attr('href');
	$('#link4').click(function(event) {
		event.preventDefault();
		$('#categories').empty();
		$('#content-wrapper').load(url);
	});
}

function validarConsultas() {
	if (!$('#nombre').val() || !$('#mail').val() || !$('#consulta').val()) {
		alert('Los campos no pueden estar vacios');
	} else {
		var nombre = $('#nombre').val();
		var mail = $('#mail').val();
		var con = $('#consulta').val();
		$.get('php/cargarConsulta.php', {nombre: nombre, mail: mail, con: con}, function() {
			alert('Su consulta ha sido enviada correctamente!');
			$('#content-wrapper').empty();
		});
	}
}

function presionarRegistro(event) {
	var url = $('#link5').attr('href');
	$('#link5').click(function(event) {
		event.preventDefault();
		$('#categories').empty();
		$('#content-wrapper').load(url);
	});
}

function validarRegistro() {
	if (!$('#usuario').val() || !$('#contrasena').val()) {
		alert('Los campos no pueden estar vacios');
	} else {
		var usu = $('#usuario').val();
		var password = $('#contrasena').val();
		$.get('php/cargarRegistro.php', {usu: usu, password: password}, function(mensaje) {
			alert(mensaje);
			if (mensaje.indexOf('correctamente') >= 0) {
				$('#content-wrapper').empty();
			}
		});
	}
}

function iniciarSesion() {
	if (!$('#newUser').val() || !$('#newPass').val()) {
		alert('Ingrese los campos correctamente!');
	} else {
		var usu = $('#newUser').val();
		var password = $('#newPass').val();
		$.get('php/iniciarSesion.php', {usu: usu, password: password}, function(mensaje) {
			if (mensaje.indexOf('no') >= 0) {
				alert('Datos incorrectos! Vuelva a intentarlo...');
			} else {
				alert('Ingreso correctamente');
				$('#login').empty().html("<button id='botonLogout' class='boton'>Cerrar Sesion</button>");
				$('#botonLogout').css('margin-top', ($('#login').height() - 30) / 2);
			}
		});
	}
}

function cerrarSesion() {
	$.get('php/cerrarSesion.php', {}, function() {
		alert('Sesion finalizada');
		$('#login').empty().html("<input type='text' id='newUser'><input type='password' id='newPass'><button id='botonLogin' class='boton'>Iniciar Sesion</button>");
		setElementsHeights();
	});
}

$(document).ready(function() {
	$(window).resize(setElementsHeights);
	setElementsHeights();
	presionarHome();
	presionarNovedades();
	presionarListado();
	presionarConsultas();
	$(document).on('click', '#botonConsulta', validarConsultas);
	presionarRegistro();
	$(document).on('click', '#botonRegistro', validarRegistro);
	$(document).on('click', '#botonLogin', iniciarSesion);
	$(document).on('click', '#botonLogout', cerrarSesion);
});