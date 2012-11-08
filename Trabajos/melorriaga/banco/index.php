<?php
	include('banco.php');
	include('cliente.php');
	include('caja.php');

	/*------------------------------------------------------------------------------------*/

	$b1 = new Banco('Banco Rio', '9 de Julio 123', '4567890');

	echo "---Banco Nro 1<br><br>";
	echo $b1->getNombre() . "<br>";
	echo $b1->getDireccion() . "<br>";
	echo $b1->getTelefono() . "<br><br>";

	/*------------------------------------------------------------------------------------*/

	echo '---Clientes' . "<br><br>";
	$b1->crearCliente('Juan', '239');
	$b1->crearCliente('Jose', '123');
	$b1->crearCliente('Pedro', '531');
	$b1->crearCliente('Ramon', '321');

	$b1->listarClientes();

	echo "---Eliminar Cliente Nro 321<br><br>";
	$b1->eliminarCliente('321');

	$b1->listarClientes();

	/*------------------------------------------------------------------------------------*/

	echo '---Cajas' . "<br><br>";
	$c1 = $b1->crearCaja('15', 'A');
	$c2 = $b1->crearCaja('10', 'A');
	$c3 = $b1->crearCaja('20', 'C');
	$c4 = $b1->crearCaja('25', 'A');

	$b1->listarCajas();

	echo '---Eliminar Caja Nro 10 y hacemos depositos y extracciones en la Caja Nro 15' . "<br><br>";
	$b1->eliminarCaja('10');
	$b1->getCaja('15')->depositar('100');
	$b1->getCaja('15')->extraer('25');

	$b1->listarCajas();

	/*------------------------------------------------------------------------------------*/

	echo "---Le agrego 3 cajas al Cliente Nro 239<br><br>";
	$b1->getCliente('239')->agregarCaja($c1);
	$b1->getCliente('239')->agregarCaja($c3);
	$b1->getCliente('239')->agregarCaja($c4);

	echo "---Listar las cajas del Cliente Nro 239<br><br>";
	$b1->getCliente('239')->listarCajas();

	/*------------------------------------------------------------------------------------*/

	echo "---Le agrego 2 cajas al Cliente Nro 123<br><br>";
	$b1->getCliente('123')->agregarCaja($c1);
	$b1->getCliente('123')->agregarCaja($c3);

	echo "---Listar las cajas del Cliente Nro 123<br><br>";
	$b1->getCliente('123')->listarCajas();


?>