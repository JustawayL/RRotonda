<?php
class Menu
{
    private $id;
    private $nombre;
    private $precio;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }

    public function cambiarProducto()
    {
        // TODO: implement here
    }
}
