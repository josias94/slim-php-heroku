<?php
include_once("Archivos.php");
include_once("BaseDatos.php");

class Empleado implements JsonSerializable{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $email;
    public $localidad;
    public $fechaDeRegistro;
    private static $_ListaEmpleados = [];
    private static $PrimerHilo = 1;

    public function __construct()
    {
        
    }
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }


    #region DB
    public static function SelectAll($id = "null"){
        $db = BaseDatos::GetSingleton("localhost","comercio");
        $response = $db->Prepare("SELECT id,
                                        nombre,
                                        apellido,
                                        clave,
                                        email,
                                        localidad,
                                        fechaDeRegistro
                                        FROM Empleado
                                        WHERE ($id is null or id = $id)
                                        ");
        $response->execute();
        $respuesta = $response->fetchAll(PDO::FETCH_CLASS, "Empleado");                
        echo Empleado::ListarArray($respuesta);
    }

    public function Insert(){
        $db = BaseDatos::GetSingleton("localhost","comercio");
        $response = $db->Prepare("INSERT INTO Empleado (nombre, apellido, clave, email, localidad, fechaDeRegistro)
                                        VALUES (:nombre,:apellido,:clave,:email,:localidad,:fechaDeRegistro)");

        $response->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $response->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $response->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $response->bindValue(':email', $this->email, PDO::PARAM_STR);
        $response->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
        $response->bindValue(':fechaDeRegistro', $this->fechaDeRegistro, PDO::PARAM_STR);
        echo ($response->execute()) ? "Se inserto el Empleado ". $db->ReturnLastInsertId()." correctamente": "Fallo al insertar";     
    }

    public static function ListarArray($array){
        $mostrar = "<ul>";
        foreach ($array as $value) {
            $mostrar .= "<li>".$value."</li><br>";       
        }
        $mostrar .= "</ul>";
        return $mostrar;
    }
    #endregion

    function __toString(){
        return $this->id.", ".$this->nombre.", ".$this->apellido.", ".$this->clave.", ".$this->email.", ".$this->localidad.", ".$this->fechaDeRegistro;
    }


    

    
    
}

?>