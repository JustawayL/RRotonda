<?php
class Funcionario
{
    private $id;
    private $nombre;
    private $clave;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }



}
