<?php

class CajaAhorro {
    
    protected $id;
    protected $banco;
    protected $cliente;
    protected $saldo;
    
    public function __construct($id, $banco, $cliente) {
        $this->id       = $id;
        $this->banco    = $banco;
        $this->cliente  = $cliente;
        $this->saldo    = 0;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setBanco($banco) {
        $this->banco = $banco;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getId(){
        return $this->id;       
    }
    
    public function getBanco(){
        return $this->banco;       
    }

    public function getCliente(){
        return $this->cliente;       
    }

    public function getSaldo(){
        return $this->saldo;       
    }

    public function depositar($importe) {
        $this->saldo = $this->saldo+$importe;
    }

    public function extraer($importe) {
        if ($this->saldo>=$importe)
            $this->saldo-=$importe;
        else 
            echo "Saldo insuficiente!\n";
    }
    
   public function mostrar() {
        echo "Banco     : ".$this->banco->getNombre()."\n";
        echo "Cliente   : ".$this->cliente->getNombre()."\n";
        echo "Nro.Cuenta: ".$this->id."\n";
        echo "Saldo     : ".$this->saldo.'<br>';    
        echo "--------------------------------------------------------\n";    
}    

}

?>
