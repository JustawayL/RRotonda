<?php


/**
 * Representa un producto
 */
class Producto
{

    /**
     * @var int Identificador del producto
     */
    private $id;

    /**
     * @var string Nombre del producto
     */
    private $nombre;

    /**
     * @var string Categoría del producto (Por ejemplo: postre)
     */
    private $categoria;

    /**
     * @var int Precio del producto en pesos
     */
    private $precio;

    /**
     * @var string Ruta donde se encuentra el archivo con la foto del producto
     */
    private $foto;

    /**
     * @var string Descripción del producto
     */
    private $descripcion;

    /**
     * @var int Cantidad del producto
     */
    private $existencias;

    /**
     * @var array Array de productos alternativos al actual
     */
    private $alternativas;

    /**
     * @var array Array de ingredientes que componen el producto
     */
    private $ingredientes;







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
     * Constructor de clase Producto
     * @param string $nombre Nombre del producto
     * @param string $categoria Categoría del producto (de acuerdo a la BD)
     * @param int $precio Precio del producto
     * @param int $existencias Número de existencias del producto
     * @param array $ingredientes Array de ingredientes que componen el producto
     */
    public function __construct5($nombre, $categoria, $precio, $existencias, $ingredientes)
    {
        $this->id=null;
        $this->nombre=$nombre;
        $this->categoria=$categoria;
        $this->precio=$precio;
        $this->foto=null;
        $this->descripcion=null;
        $this->existencias=$existencias;
        $this->alternativas=[];
        $this->ingredientes=$ingredientes;
    }

    /**
     * Constructor solo con el ID
     * @param int $id Identificador del producto
     */
    public function __construct1($id)
    {
        $this->id=$id;
        $this->nombre=null;
        $this->categoria=null;
        $this->precio=null;
        $this->foto=null;
        $this->descripcion=null;
        $this->existencias=null;
        $this->alternativas=[];
        $this->ingredientes=[];
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
     * Agrega un producto alternativo al actual
     * @param \Producto $producto Producto alternativo
     */
    public function addAlternativa($producto)
    {
        $this->alternativas[]=$producto;
    }

    /**
     * Agrega un ingrediente que compone al producto
     * @param \Ingrediente $ingrediente Ingrediente
     */
    public function addIngrediente($ingrediente)
    {
        $this->ingredientes[]=$ingrediente;
    }
}
