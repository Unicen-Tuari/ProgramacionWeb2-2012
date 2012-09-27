<?php
    include_once './clases/bancos/Cliente.php';
    include_once './clases/bancos/Banco.php';
    include_once './clases/bancos/CajaAhorro.php';
    
    echo '<pre>';

    $banco      = new Banco(14, "Banco de la provincia de Bs. As.");

    $cliente    = $banco->agregarCliente(1, "Matias");
    $banco->agregarCuenta($cliente);
    $banco->agregarCuenta($cliente);
    $banco->agregarCuenta($cliente);
    
    $cliente1    = $banco->agregarCliente(2, "Yuki");
    $banco->agregarCuenta($cliente1);

    $banco->depositar(3, 100);
    $banco->depositar(3, 100);
    $banco->depositar(3, 100);

    $banco->depositar(2, 100);

    
    $cliente->listarCuentas();
    echo "-----------------\n";
    $cliente1->listarCuentas();
    echo "-----------------\n";
    
    $banco->listarCuentas();

    $banco->listarClientes();

    echo '</pre>';

    
?>
