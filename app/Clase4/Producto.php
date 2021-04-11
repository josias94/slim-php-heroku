<?php
include_once("Archivos.php");

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
                $this->id = "0";    
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

    public function __toString(){
        return $this->id.", ".$this->nombre.", ".$this->tipo.", ".$this->stock.", ".$this->precio.", ".$this->codBarra;
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
            //echo ("producto:$this->nombre Nuevo Stock: $stockActual");
            echo "Actualizado";
        }
        else{            
            echo (EscribirArchivoJSON("Productos/Productos.json", $this) > 0) ? "Ingresado" : "No se pudo hacer";            
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

    public static function ListarJSON(){
        $array = LeerArchivoJSON("Productos/Productos.json");
        $mostrar = "<ul>";
        foreach ($array as $val) {
            $prod = new Producto($val->nombre, $val->tipo, $val->stock, $val->precio, $val->codBarra,$val->id);
            $path = "Productos/Fotos/".$prod->codBarra.".png";
            $foto = base64_encode(file_get_contents($path));
            $src = 'data:'.mime_content_type($path).';base64,'.$foto; 
            
            $mostrar .= "<li>".$prod."<img width='50' height='50' src=\"$src\">"."</li><br>";
        }
        $mostrar .= "</ul>";
        return $mostrar;
    }
}

?>