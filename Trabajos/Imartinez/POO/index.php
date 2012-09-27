<?php

include_once('./clases/banco.php');

//creamos un nuevo banco
$banco = new Banco(1,"Banco Santander","9 de Julio 123",0);

//creamos un nuevo cliente
$cliente = $banco->crear_cliente(31156169,"Nacho Martinez","asdasdasdas 141");

//creamos una nueva caja de ahorro
$micaja = $banco->crear_caja(31156169);

//depositamos en una cuenta
$micaja->depositar(50);

//consultamos el saldo
echo "Saldo actual: ".$micaja->saldo_actual();

//extraemos de una cuenta
$micaja->extraer(25);

//consultamos el saldo
echo "Saldo actual: ".$micaja->saldo_actual();

echo "Listamos de cuentas de 31 156 169";
$banco->listar_cuentas_cliente(31156169);

//creamos un nuevo cliente
$cliente = $banco->crear_cliente(30312312,"Alejandra","aaaa 123123567881");

//creamos una nueva caja de ahorro
$micaja = $banco->crear_caja(30312312);

//depositamos en una cuenta
$micaja->depositar(250);

//creamos una nueva caja de ahorro
$micaja2 = $banco->crear_caja(30312312);

$micaja2->depositar(450);

echo "Listamos de cuentas de 30312312";
$banco->listar_cuentas_cliente(30312312);

?>


