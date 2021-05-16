<?php

include_once("Empleado.php");
include_once("Producto.php");

if (isset($_POST["codBarra"]) && isset($_POST["idEmpleado"]) && isset($_POST["cantItems"])){
    $Empleado = Empleado::BuscarPorId($_POST["idEmpleado"]);
    $producto = Producto::BuscarPorCodBarra($_POST["codBarra"]);
    $cant = $_POST["cantItems"];
    if(!isset($Empleado)){
        http_response_code(404);
        echo "Empleado incorrecto<br>"; return;                
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
        $v = new Venta($_POST["idEmpleado"], $_POST["codBarra"], $_POST["cantItems"]);
        echo (EscribirArchivoJSON("Venta/Venta.json", $v) > 0) ? "Se agrego la venta correctamente al archivo" : "Error al guardar";
    }


    
}
else{
    http_response_code(404);
    echo "Faltan Datos";
}

class Venta{
    public $id;
    public $idEmpleado;
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


        $this->idEmpleado = $id;
        $this->codBarra = $cod;
        $this->cantItems = $cant;
    }
}

?>