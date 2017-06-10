<?php


/**
 * Ingrediente necesario para hacer un producto
 */
class Ingrediente
{

    /**
     * @var int Identificador del ingrediente
     */
    private $id;

    /**
     * @var string Nombre del ingrediente
     */
    private $nombre;

    /**
     * @var int Número de existencias del ingrediente
     */
    private $existencias;

    /**
     * @var array Array con los ingredientes alternativos
     */
    private $alternativas;




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
     * Constructor clase Ingrediente
     * @param string $nombre Nombre del ingrediente
     * @param int $existencias Número de existencias
     */
    public function __construct2($nombre, $existencias)
    {
        $this->id=null;
        $this->nombre=$nombre;
        $this->existencias=$existencias;
        $this->alternativas=[];
    }

    /**
     * Constructor solo con ID
     * @param int $id Identificador del ingrediente
     */
    public function __construct1($id)
    {
        $this->id=$id;
        $this->nombre=null;
        $this->existencias=null;
        $this->alternativas=[];
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
     * Agrega un ingrediente alternativo al actual
     * @param \Ingrediente $alternativa Ingrediente alternativo
     */
    public function addAlternativa($alternativa)
    {
        $this->alternativas[]=$alternativa;
    }
}
