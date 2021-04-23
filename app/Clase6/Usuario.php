<?php
include_once("Archivos.php");
include_once("BaseDatos.php");

class Usuario implements JsonSerializable{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $email;
    public $localidad;
    public $fechaDeRegistro;
    private static $_ListaUsuarios = [];
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
                                        FROM Usuario
                                        WHERE ($id is null or id = $id)
                                        ");
        $response->execute();
        $respuesta = $response->fetchAll(PDO::FETCH_CLASS, "usuario");                
        echo Usuario::ListarArray($respuesta);
    }

    public function Insert(){
        $db = BaseDatos::GetSingleton("localhost","comercio");
        $response = $db->Prepare("INSERT INTO usuario (nombre, apellido, clave, email, localidad, fechaDeRegistro)
                                        VALUES (:nombre,:apellido,:clave,:email,:localidad,:fechaDeRegistro)");

        $response->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $response->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $response->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $response->bindValue(':email', $this->email, PDO::PARAM_STR);
        $response->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
        $response->bindValue(':fechaDeRegistro', $this->fechaDeRegistro, PDO::PARAM_STR);
        echo ($response->execute()) ? "Se inserto el usuario ". $db->ReturnLastInsertId()." correctamente": "Fallo al insertar";     
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


    // public function ValidarUser(){
    //     if(Usuario::$PrimerHilo){
    //         $array = LeerArchivoTxt("Usuarios/Usuarios.csv");
    //         foreach ($array as $value) {
    //             $obj = explode(",", $value);                
    //             $usuario = new Usuario($obj[0], $obj[1], null);
    //             array_push(Usuario::$_ListaUsuarios, $usuario);
    //         }            
    //         Usuario::$PrimerHilo = 0;        
    //     }
        
    //     $msg = "";
    //     if(isset($this->_user) && isset($this->_pass)){
    //         if(in_array($this, Usuario::$_ListaUsuarios)){
    //             $msg = "Usuario $this->_user ingreso correctamente,".date("d/m/Y H:i:s");                
    //         }
    //         else{
    //             http_response_code(401);
    //             $msg = "Usuario $this->_user no registrado, ".date("d/m/Y H:i:s");
    //         }                    
    //     }
    //     else{
    //         http_response_code(400);
    //         $msg = "Faltan Datos, ".date("d/m/Y H:i:s");
    //     }        
    //     echo $msg;
    //     EscribirArchivoTxt("Usuarios/log.csv", $msg);
    // }

    // public static function Listar(){
    //     $array = LeerArchivoTxt("Usuarios/Usuarios.csv");
    //     $mostrar = "<ul>";
    //     foreach ($array as $value) {        
    //         $obj = explode(",", $value);
    //         $usuario = new Usuario($obj[0], $obj[1], $obj[2]);
    //         $mostrar .= "<li>".$usuario."</li><br>";      
    //     }
    //     $mostrar .= "</ul>";
    //     return $mostrar;
    // }

    // public static function ListarJSON(){        
    //     $array = LeerArchivoJSON("Usuarios/Usuarios.json");
    //     var_dump($array);
    //     $mostrar = "<ul>";
    //     foreach ($array as $value) {
    //         $usuario = new Usuario($value->_user, $value->_pass, $value->_mail, $value->_id);
    //         $path = "Usuarios/Fotos/".$usuario->_user.".png";
    //         $foto = base64_encode(file_get_contents($path));
    //         $src = 'data:'.mime_content_type($path).';base64,'.$foto; 

    //         $mostrar .= "<li>".$usuario."<img width='50' height='50' src=\"$src\">"."</li><br>";
    //     }
    //     $mostrar .= "</ul>";
    //     return $mostrar;
    // }

    // public function Alta(){
    //     echo (EscribirArchivoTxt("Usuarios/Usuarios.csv", $this) > 0) ? "Se agrego el usuario correctamente al archivo" : "Error al guardar";
    // }

    // public function AltaJSON(){
    //     echo (EscribirArchivoJSON("Usuarios/Usuarios.json", $this) > 0) ? "Se agrego el usuario correctamente al archivo" : "Error al guardar";
    // }

    

    // public static function BuscarPorId($id){
    //     $array = LeerArchivoJSON("Usuarios/Usuarios.json");
        
    //     foreach ($array as $value) {
    //         if($value->_id == $id)
    //         {
    //             return new Usuario($value->_user, $value->_pass, $value->_mail, $value->_id);
    //         }                            
    //     }
    //     return null;
    // }

    
    
}

?>