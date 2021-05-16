<?php
/*Rivola Josias
Aplicación Nº 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
carga los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en las clases*/
include_once("Usuario.php");
include_once("Producto.php");

if (isset($_POST["codBarra"]) && isset($_POST["idUsuario"]) && isset($_POST["cantItems"])){
    $usuario = Usuario::BuscarPorId($_POST["idUsuario"]);
    $producto = Producto::BuscarPorCodBarra($_POST["codBarra"]);
    $cant = $_POST["cantItems"];
    if(!isset($usuario)){
        http_response_code(404);
        echo "Usuario incorrecto<br>"; return;                
    }
    if(!isset($producto)){
        http_response_code(404);
        echo "Producto incorrecto<br>"; return;
    }
    if($producto->stock < $cant){
        echo "Solo se puede comprar un maxima de $producto->stock unidades del producto<br>"; return;
    }
    else{
        $producto->stock = ($cant * -1);        
        $producto->SumarStock();
        $v = new Venta($_POST["idUsuario"], $_POST["codBarra"], $_POST["cantItems"]);
        echo (EscribirArchivoJSON("Venta/Venta.json", $v) > 0) ? "Se agrego la venta correctamente al archivo" : "Error al guardar";
    }


    
}
else{
    http_response_code(404);
    echo "Faltan Datos";
}

class Venta{
    public $id;
    public $idUsuario;
    public $codBarra;
    public $cantItems;

    public function __construct($id, $cod, $cant){

        $array = LeerArchivoJSON("Venta/Venta.json");
        if(count($array) == 0){                
            $this->id = "0";    
        }
        else{                
            $element = array_pop($array);
            $this->id = strval($element->id + 1);
        }


        $this->idUsuario = $id;
        $this->codBarra = $cod;
        $this->cantItems = $cant;
    }
}

?>