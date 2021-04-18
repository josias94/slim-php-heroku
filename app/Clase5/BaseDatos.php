<?php

class BaseDatos{
    private static $ObjetoBaseDatos;
    private $_PDO;

    private function __construct($host, $dbName, $user = null, $pass = null, $codif = null)
    {
        if($user == null) $user = "root";
        if($pass == null) $pass = "";
        if($pass == null) $pass = "";
        if($codif == null) $codif = "utf8";

        try{
            $this->_PDO = new PDO('mysql:host='.$host.';dbname='.$dbName.'.;charset='.$codif, $user, $pass, array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    public static function GetSingleton($host, $dbName, $user = null, $pass = null, $codif = null){
        if(!isset(self::$ObjetoBaseDatos)){
            self::$ObjetoBaseDatos = new BaseDatos($host, $dbName, $user, $pass, $codif);
        }
        return self::$ObjetoBaseDatos;
    }

    //TODO: Revisar... 
    public function ReturnLastInsertId(){
        return $this->objetoPDO->lastInsertId();
    }

    public function Execute($sql){
        return $this->_PDO->prepare($sql);
    }

    public function __clone(){
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }
} 

?>
