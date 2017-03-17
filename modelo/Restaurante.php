<?php
class Restaurante
{
    private $id;
    private $nombre;
    private $direccion;
    private $telefono;
    private $descripcion;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }

}

