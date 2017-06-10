<?php


/**
 * Clase Abstracta DAO que utiliza PDO
 */
abstract class DaoPdo
{

    /**
     * @var PDO Objeto PDO
     */
    protected $pdo;


    public function __construct($dsn, $user, $password)
    {
        try{
        	$this->pdo = new PDO($dsn, $user, $password);
        	$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
            $this->pdo->exec("set names utf8");
        }catch(Exception $e){
        	die($e->getMessage());
        }
    }
}
