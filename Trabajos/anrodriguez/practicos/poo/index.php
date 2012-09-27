<?php
    include_once './clases/Producto.php';
    include_once './clases/ProductoIVA.php';
    include_once './clases/ProductoTarjeta.php';
    include_once './clases/ProductoTarjeta1.php';
    
    echo '<pre>';
    
    $producto1 = new Producto(1,"222",0);
    $producto1->setId(1);
    $producto1->setNombre('Producto Numero 1');
    $producto1->setPrecio(100);
    echo "Producto: ".$producto1->getNombre()." - ".$producto1->getPrecio()."\n";
    

    $producto2 = new Producto();
    $producto2->setId(2);
    $producto2->setNombre('Producto Numero Dos');
    $producto2->setPrecio(200);    
    echo "Producto: ".$producto2->getNombre()." - ".$producto2->getPrecio().'<br>';
    
    $producto3 = new ProductoIVA();
    $producto3->setId(3);
    $producto3->setNombre('Producto Numero Tres (IVA)');
    $producto3->setPrecio(200);
    echo "Producto: ".$producto3->getNombre()." - ".$producto3->getPrecio().'<br>';
    
    $producto4 = new ProductoTarjeta();
    $producto4->setId(4);
    $producto4->setNombre('Producto Numero Cuatro (Tarjeta)');
    $producto4->setPrecio(200);
    echo "Producto: ".$producto4->getNombre()." - ".$producto4->getPrecio().'<br>';

    echo '</pre>';
    
?>
