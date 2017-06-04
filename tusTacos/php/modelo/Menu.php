<?php


/**
 * Menú de comidas
 */
class Menu
{

    /**
     * @var int Identificador del menú
     */
    private $id;

    /**
     * @var string Nombre del menú
     */
    private $nombre;

    /**
     * @var int Precio en pesos del menú
     */
    private $precio;

    /**
     * @var boolean Verdadero si es un menú personalizado, falso si no lo es
     */
    private $personalizado;

    /**
     * @var array Productos de los que se compone el menú
     */
    private $productos;




    /**
     * Constructor que redirige al constructor correspondiente
     */
    public function __construct()
    {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //cada constructor de un número dado de parámtros tendrá un nombre de función
        //atendiendo al siguiente modelo __construct1() __construct2()...
        $funcion_constructor ='__construct'.$num_params;
        //compruebo si hay un constructor con ese número de parámetros
        if (method_exists($this,$funcion_constructor)) {
        	//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
        	call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }

    /**
     * Constructor Clase Menú
     * @param string $nombre Nombre del menú
     * @param int $precio Precio del menú
     * @param boolean $personalizado True si es personalizado, false si no
     * @param array $productos Array con los productos del menú
     */
    public function __construct4($nombre, $precio, $personalizado, $productos)
    {
        $this->id=null;
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->personalizado=$personalizado;
        $this->productos=$productos;
    }

    /**
     * Constructor con solo ID
     * @param int $id Identificador del menú
     */
    public function __construct1($id)
    {
        $this->id=$id;
        $this->nombre=null;
        $this->precio=null;
        $this->personalizado=null;
        $this->productos=[];
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
     * Agrega un producto al menú
     * @param \Producto $producto Producto a incluir en el menú
     */
    public function addProducto($producto)
    {
        $this->productos[]=$producto;
    }
}
