<?php
class Ingrediente
{
    private $id;
    private $nombre;
    private $restaurante;
    private $existencias;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }

}

