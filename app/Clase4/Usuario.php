<?php
include("Archivos.php");

class Usuario{
    public $_id;
    public $_user;
    public $_pass;
    public $_mail;
    private static $_ListaUsuarios = [];
    private static $PrimerHilo = 1;


    public function __construct($user, $pass, $mail = null, $id = null){
        $this->_user = $user;
        $this->_pass = $pass;
        $this->_mail = $mail;
        if($id != null){
            $this->_id = $id;
        }
        else{            
            $array = LeerArchivoJSON("Usuarios.json");
            $element = array_pop($array);
            $this->_id = strval($element->_id + 1);
        }        
    }
    

    public function ValidarUser(){
        if(Usuario::$PrimerHilo){
            $array = LeerArchivoTxt("Usuarios.csv");
            foreach ($array as $value) {
                $obj = explode(",", $value);                
                $usuario = new Usuario($obj[0], $obj[1], null);
                array_push(Usuario::$_ListaUsuarios, $usuario);
            }            
            Usuario::$PrimerHilo = 0;        
        }
        
        $msg = "";
        if(isset($this->_user) && isset($this->_pass)){
            if(in_array($this, Usuario::$_ListaUsuarios)){
                $msg = "Usuario $this->_user ingreso correctamente,".date("d/m/Y H:i:s");                
            }
            else{
                http_response_code(401);
                $msg = "Usuario $this->_user no registrado, ".date("d/m/Y H:i:s");
            }                    
        }
        else{
            http_response_code(400);
            $msg = "Faltan Datos, ".date("d/m/Y H:i:s");            
        }        
        echo $msg;
        EscribirArchivoTxt("log.csv", $msg);
    }

    public static function Listar(){
        $array = LeerArchivoTxt("Usuarios.csv");
        $mostrar = "<ul>";
        foreach ($array as $value) {        
            $obj = explode(",", $value);
            $usuario = new Usuario($obj[0], $obj[1], $obj[2]);
            $mostrar .= "<li>".$usuario."</li><br>"; 
            // foreach ($obj as $atributo) {
            //     $mostrar .= "<li>".$atributo."</li><br>";
            // }        
        }
        $mostrar .= "</ul>";
        return $mostrar;
    }

    public function Alta(){        
        echo (EscribirArchivoTxt("Usuarios.csv", $this) > 0) ? "Se agrego el usuario correctamente al archivo" : "Error al guardar";
    }

    public function AltaJSON(){
        echo (EscribirArchivoJSON("Usuarios.json", $this) > 0) ? "Se agrego el usuario correctamente al archivo" : "Error al guardar";
    }


    function __toString(){
        return $this->_user.",".$this->_pass.",".$this->_mail;
    }
}

?>