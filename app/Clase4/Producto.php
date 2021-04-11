<?php
include("Archivos.php");

class Producto{
    public $id;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $codBarra;
    private static $_ListaProductos = [];
    private static $PrimerHilo = 1;

    public function __construct($nombre, $tipo, $stock, $precio, $codBarra, $id = null){
        if($id != null){
            $this->id = $id;
        }
        else{
            $array = LeerArchivoJSON("Productos.json");
            if(count($array) == 0){
                $this->id = 0;    
            }
            else{
                $element = array_pop($array);
                $this->id = strval($element->id + 1);
            }
        }
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->codBarra = $codBarra;
    }

    public function ValidarProducto(){
        if(Producto::$PrimerHilo){
            $array = LeerArchivoJSON("Productos/Productos.json");
            foreach ($array as $obj) {
                $prod = new Producto($obj->nombre, $obj->tipo, $obj->stock, $obj->precio, $obj->codBarra, $obj->id);
                array_push(Producto::$_ListaProductos, $prod);
            }            
            Producto::$PrimerHilo = 0;
        }        
        foreach (Producto::$_ListaProductos as $val) {
            if($this->codBarra == $val->codBarra){
                return true;
            }
        }
        return false;
    }

    public function AltaJSON(){

        if($this->ValidarProducto()){
            $stockActual = $this->SumarStock();
            echo ("producto:$this->nombre Nuevo Stock: $stockActual");
        }
        else{
            echo (EscribirArchivoJSON("Productos/Productos.json", $this) > 0) ? "Se agrego el producto correctamente al archivo" : "Error al guardar";            
        }        
    }

    public function SumarStock(){
        $array = LeerArchivoJSON("Productos/Productos.json");
        for ($i=0; $i < count($array); $i++) {             
            if($this->codBarra == $array[$i]->codBarra){
                $array[$i]->stock += $this->stock;
                EscribirArrayJSON("Productos/Productos.json",$array);
                return $array[$i]->stock;
            }
        }
        return 0;  
    }
}

?>