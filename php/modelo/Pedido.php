<?php
class Pedido
{
    private $id;
    private $estado;
    private $cliente;
    private $fecha;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    public function calcularPrecio()
    {
        // TODO: implement here
    }
}
