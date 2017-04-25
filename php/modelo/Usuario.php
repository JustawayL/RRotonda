<?php


/**
 * Usuario del sistema
 */
class Usuario
{

    /**
     * @var string Nombre de usuario
     */
    private $nombre;

    /**
     * @var string Contraseña del usuario
     */
    private $clave;





    /**
     * Constructor clase Usuario
     * @param string $nombre
     * @param string $clave
     */
    public function __construct($nombre, $clave)
    {
        $this->nombre=$nombre;
        $this->clave=$clave;
    }

    /**
     * Obtiene el nombre del usuario
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Retorna la clave del usuario
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Cambia la clave del usuario
     * @param string $clave Nueva clave
     */
    public function setClave($clave)
    {
        $this->clave=$clave;
    }
}
