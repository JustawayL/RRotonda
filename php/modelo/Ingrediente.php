<?php
class Ingrediente
{
    private $id;
    private $nombre;
    private $existencias;
    private $lista_Ingredientes;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }

}

