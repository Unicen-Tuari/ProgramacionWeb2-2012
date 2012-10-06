/********************** mostrar/ocultar login ****************************************************/

$('#botonIngresar').live('click', showLogin);
$('#botonLogin').live('click', clickLogin);
$('#botonCerrar').live('click', close);

var loginVisible = false;

function showLogin() {
	if (!loginVisible) {
		document.getElementById('login').setAttribute('class', 'visible');
		document.getElementById('botonIngresar').firstChild.nodeValue = 'Volver';
		loginVisible = true;
	} else {
		if (loginVisible && document.getElementById('botonIngresar').firstChild.nodeValue == 'Ingresar') {
			document.getElementById('login').setAttribute('class', 'visible');
			document.getElementById('botonIngresar').firstChild.nodeValue = 'Volver';
			loginVisible = true;
		} else {
			document.getElementById('login').setAttribute('class', 'oculto');
			document.getElementById('botonIngresar').firstChild.nodeValue = 'Ingresar';
			loginVisible = false;
		}
	}
}

function clickLogin() {
	var usuario = document.getElementById('usuarioLogin').value;
	var contrasena = document.getElementById('contrasenaLogin').value;
	if (usuario.length != 0 && contrasena.length) {
		login(usuario, contrasena);
	} else {
		alert('Los campos no pueden estar vacios');
	}
}

function login(usuario, contrasena) {
	conexion = createXMLHttpRequest();
	conexion.onreadystatechange = actualizarNews;
	conexion.open('POST', 'iniciarSesion.php', true);
	conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	conexion.send(retornarDatosRegistro(usuario, contrasena));
}

function close() {
	conexion = createXMLHttpRequest();
	conexion.onreadystatechange = actualizarNews;
	conexion.open('GET', 'cerrarSesion.php', true);
	conexion.send(null);
}

function actualizarNews() {
	var content = document.getElementById('news');
	if (conexion.readyState == 4) {
		content.innerHTML = conexion.responseText;
	} else {
		content.innerHTML = ' ';
	}
}

/*************************************************************************************************/

addEvent(window, 'load', initEvents, false);

var conexion;
var conexion2;

function initEvents() {									// (usando JQuery)
	$('.item > a').live('click', clickLink);			// live = Attach an event handler for all elements which
}														// match the current selector, now and in the future.

function initCategories() {
	$('.categoria > a').die('click', clickCategory);
	$('.categoria > a').live('click', clickCategory);
}

function initBotonConsulta() {
	$('#botonConsulta').die('click', clickBotonConsulta);
	$('#botonConsulta').live('click', clickBotonConsulta);
}

function initBotonRegistro() {
	$('#botonRegistro').die('click', clickBotonRegistro);
	$('#botonRegistro').live('click', clickBotonRegistro);
}

function clickLink(e) {
	window.event.returnValue = false || e.preventDefault();
	var url = window.event.srcElement.getAttribute('href') || e.target.getAttribute('href');
	if (url == 'listadoAjax.php') {
		cargarBloqueCategorias();
		initCategories();
	} else {
		borrarBloqueCategorias();
	}
	if (url == 'consultasAjax.php') {
		initBotonConsulta();
	}
	if (url == 'registroAjax.php') {
		initBotonRegistro();
	}
	cargarBloqueContent(url);
}

function cargarBloqueContent(url) {
	conexion = createXMLHttpRequest();
	conexion.onreadystatechange = cargarContent;
	conexion.open('GET', url, true);
	conexion.send(null);
}

function cargarContent() {
	var content = document.getElementById('content');
	if (conexion.readyState == 4) {
		content.innerHTML = conexion.responseText;
	} else {
		content.innerHTML = ' ';
	}
}

function clickCategory(e) {
	window.event.returnValue = false || e.preventDefault();
	var url = window.event.srcElement.getAttribute('href') || e.target.getAttribute('href');
	cargarBloqueContent(url);
}

function cargarBloqueCategorias() {
	conexion2 = createXMLHttpRequest();
	conexion2.onreadystatechange = cargarCategorias;
	conexion2.open('GET', 'categoriasAjax.php', true);
	conexion2.send(null);
}

function cargarCategorias() {
	var categorias = document.getElementById('categorias');
	if (conexion2.readyState == 4) {
		categorias.innerHTML = conexion2.responseText;
	} else {
		categorias.innerHTML = ' ';
	}
}

function borrarBloqueCategorias() {
	var categorias = document.getElementById('categorias');
	categorias.innerHTML = ' ';
}

function clickBotonConsulta() {
	var nombre = document.getElementById('nombre').value;
	var mail = document.getElementById('mail').value;
	var consulta = document.getElementById('consulta').value;
	if (nombre.length != 0 && mail.length != 0 && consulta.length != 0) {
		enviarConsulta(nombre, mail, consulta);
	} else {
		alert('Los campos no pueden estar vacios');
	}
}

function enviarConsulta(nombre, mail, consulta) {
	conexion = createXMLHttpRequest();
	conexion.onreadystatechange = cargarContent;
	conexion.open('POST', 'cargarConsulta.php', true);
	conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	conexion.send(retornarDatosConsulta(nombre, mail, consulta));
}

function retornarDatosConsulta(nombre, mail, consulta) {
	return 'nombre=' + encodeURIComponent(nombre) + '&mail=' + encodeURIComponent(mail) + '&consulta=' + encodeURIComponent(consulta);
}

function clickBotonRegistro() {
	var usuario = document.getElementById('usuario').value;
	var contrasena = document.getElementById('contrasena').value;
	if (usuario.length != 0 && contrasena.length) {
		enviarRegistro(usuario, contrasena);
	} else {
		alert('Los campos no pueden estar vacios');
	}
}

function enviarRegistro(usuario, contrasena) {
	conexion = createXMLHttpRequest();
	conexion.onreadystatechange = cargarContent;
	conexion.open('POST', 'cargarRegistro.php', true);
	conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	conexion.send(retornarDatosRegistro(usuario, contrasena));
}

function retornarDatosRegistro(usuario, contrasena) {
	return 'usuario=' + encodeURIComponent(usuario) + '&contrasena=' + encodeURIComponent(contrasena);
}

function addEvent(elemento, nomevento, funcion, captura) {
	if (elemento.attachEvent) {
		elemento.attachEvent('on' + nomevento, funcion);
		return true;
	} else {
		if (elemento.addEventListener) {
			elemento.addEventListener(nomevento, funcion, captura);
			return true;
		} else {
			return false;
		}
	}
}

function createXMLHttpRequest() {
	var XMLHttp = null;
	if (window.ActiveXObject) {
		XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		if (window.XMLHttpRequest) {
			XMLHttp = new XMLHttpRequest();
		}
		return XMLHttp;
	}
}

/********************** reloj (canvas) ***********************************************************/

var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
var ancho = canvas.width;
var alto = canvas.height;
var centroX = ancho / 2;
var centroY = alto / 2;

var angulo = null;
var anguloX = null;
var anguloY = null;
var longitudSegundero = centroX - 28;
var longitudMinutero = centroX - 32;
var longitudHora = centroX - 40;

setInterval(update, 500);

function update() {
	//pintar el fondo
	ctx.fillStyle = '#A8DBA8';
	ctx.fillRect(0, 0, ancho, alto);

	ctx.lineCap = 'round';
	ctx.strokeStyle = '#0B486B';

	//dibujar el border del reloj
	ctx.lineWidth = 7;
	ctx.beginPath();
	ctx.arc(centroX, centroY, centroX - 20, 0, 2 * Math.PI, false);
	ctx.stroke();
	ctx.closePath();

	var ahora = new Date();

	//dibujar los segundos 
	angulo = 2 * Math.PI * ahora.getSeconds() / 60 - Math.PI / 2;
	anguloX = centroX + Math.cos(angulo) * longitudSegundero;
	anguloY = centroY + Math.sin(angulo) * longitudSegundero;
	ctx.lineWidth = 2;
	ctx.beginPath();
	ctx.moveTo(centroX, centroY);
	ctx.lineTo(anguloX, anguloY);
	ctx.stroke();
	ctx.closePath();

	//dibujar los minutos
	angulo = 2 * Math.PI * ahora.getMinutes() / 60 - Math.PI / 2;
	anguloX = centroX + Math.cos(angulo) * longitudMinutero;
	anguloY = centroY + Math.sin(angulo) * longitudMinutero;
	ctx.lineWidth = 3;
	ctx.beginPath();
	ctx.moveTo(centroX, centroY);
	ctx.lineTo(anguloX, anguloY);
	ctx.stroke();
	ctx.closePath();

	//dibujar las horas
	angulo = 2 * Math.PI * (ahora.getHours() % 12) / 12 - Math.PI / 2;
	anguloX = centroX + Math.cos(angulo) * longitudHora;
	anguloY = centroY + Math.sin(angulo) * longitudHora;
	ctx.lineWidth = 4;
	ctx.beginPath();
	ctx.moveTo(centroX, centroY);
	ctx.lineTo(anguloX, anguloY);
	ctx.stroke();
	ctx.closePath();
}