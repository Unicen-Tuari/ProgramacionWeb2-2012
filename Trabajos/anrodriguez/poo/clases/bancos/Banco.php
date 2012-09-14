<?php

class Banco {
    
    protected $id;
    protected $nombre;
    protected $ultimoNroCajaAhorro=1;


    protected $clientes = array();
    protected $cuentas  = array();

    public function __construct($id, $nombre) {
        $this->id       = $id;
        $this->nombre   = $nombre;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getId(){
        return $this->id;       
    }
    
    public function getNombre(){
        return $this->nombre;       
    }

    public function agregarCliente($id, $nombre) {
        $cliente = new Cliente($id, $nombre);
        $this->clientes[] = $cliente;
        return $cliente;
    }

    public function agregarCuenta($cliente) {
        $cuenta = new CajaAhorro($this->ultimoNroCajaAhorro++, $this, $cliente);
        $this->cuentas[] = $cuenta;
        $cliente->agregarCuenta($cuenta);
    }

    public function depositar($cuenta, $importe) {
        foreach ($this->cuentas as $cta) {
            if ($cuenta==$cta->getId())
                $cta->depositar($importe);
        }
        
    }

    public function listarClientes() {
        foreach ($this->clientes as $cliente)
            $cliente->mostrar();
    }

    public function listarCuentas() {
        foreach ($this->cuentas as $cuenta)
            $cuenta->mostrar();
    }
}

?>
