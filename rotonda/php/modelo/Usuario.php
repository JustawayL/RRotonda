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
     * @var array Array con los roles que cuenta el usuario
     */
    private $roles;





    /**
     * Constructor clase Usuario
     * @param string $nombre
     * @param string $clave
     */
    public function __construct($nombre, $clave)
    {
        $this->nombre=$nombre;
        $this->clave=$clave;
        $this->roles=[];
    }

    /**
     * Get genérico de php para todos los atributos
     * @param void $k Nombre del atributo
     */
    public function __get($k)
    {
        return $this->$k;
    }

    /**
     * Set genérico para todos los atributos
     * @param void $k Nombre del atributo
     * @param void $v Valor que se le asigna al atributo
     */
    public function __set($k, $v)
    {
        return $this->$k = $v;
    }

    /**
     * Agrega un rol nuevo al usuario
     * @param string $rol Nuevo rol
     */
    public function addRol($rol)
    {
        $this->roles[]=$rol;
    }
}
