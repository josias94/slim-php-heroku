<?php
/*
Rivola Josias
Aplicación Nº 15 (Figuras geométricas)
La clase FiguraGeometrica posee: todos sus atributos protegidos, un constructor por defecto,
un método getter y setter para el atributo _color, un método virtual (ToString) y dos
métodos abstractos: Dibujar (público) y CalcularDatos (protegido).
CalcularDatos será invocado en el constructor de la clase derivada que corresponda, su
funcionalidad será la de inicializar los atributos _superficie y _perimetro.
Dibujar, retornará un string (con el color que corresponda) formando la figura geométrica del
objeto que lo invoque (retornar una serie de asteriscos que modele el objeto).

Utilizar el método ToString para obtener toda la información completa del objeto, y luego
dibujarlo por pantalla.
*/



abstract class FiguraGeometrica{

    protected $_color;
    protected $_perimetro;//Suma de lados
    protected $_superficie;//Base  x Altura 

    public function __construct(){
        $this->_color = "black";
        $this->_perimetro = 0;
        $this->_superficie = 0;
    }

    public function GetColor(){
        return $this->_color;    
    }

    public function SetColor($newColor){
        $this->_color = $newColor;
    }

    public function __ToString(){
        return "Color: ".ucfirst($this->GetColor())."<br>Perimetro: ".$this->_perimetro."<br>Superficie: ".$this->_superficie."<br>";
    }

    public abstract function Dibujar();
    protected abstract function CalcularDatos();
}

class Rectangulo extends FiguraGeometrica{
    public $_ladoUno;
    public $_ladoDos;

    public function __construct($l1, $l2){
        parent::__construct();
        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;
        $this->CalcularDatos();
    }

    protected function CalcularDatos(){
        $this->_perimetro = $this->_ladoUno*2 + $this->_ladoDos*2;
        $this->_superficie = $this->_ladoUno*$this->_ladoDos;
    }

    public function Dibujar(){
        $color = $this->GetColor();
        $retorno = "<p style=color:$color;>";
        $columnas = $this->_ladoUno;
        $filas = $this->_ladoDos;

        for ($j=0; $j < $filas ; $j++) {             
            for ($i=0; $i < $columnas; $i++) { 
                // if($i == 0 || $i == $columnas-1 || $j == 0 || $j == $filas - 1){
                //     $retorno .= "*";
                // }
                // else{
                //     $retorno .= "&nbsp;&nbsp;";
                // }
                $retorno .= "*";
            }         
            $retorno .= "<br>";
        }
        $retorno.= "</p>";
        return $retorno;
    }

    public function __ToString(){
        return parent::__ToString()."Altura: ".$this->_ladoDos."<br>Ancho: ".$this->_ladoUno.$this->Dibujar();
    }
}

class Triangulo extends FiguraGeometrica{
    public $_altura;
    public $_base;

    public function __construct($b, $a){
        parent::__construct();
        $this->_altura = $a;
        $this->_base = $b;
        $this->CalcularDatos();
    }

    protected function CalcularDatos(){
        $this->_perimetro = $this->_base + $this->_altura*2;
        $this->_superficie = $this->_base * $this->_altura/2;
    }

    public function Dibujar(){
        $color = $this->GetColor();
        $retorno = "<p style=color:$color;>";
        $base = $this->_base;    
        $altura = $this->_altura;
        $espacios = $altura;
        $asteriscos = 1;
        for ($i=0; $i < $altura; $i++) {
            for ($j=0; $j < $espacios-1; $j++) {
                $retorno .= "&nbsp;&nbsp;";
                //$retorno .= "+";
            }
            for ($j=0; $j < $asteriscos; $j++) {
                $retorno .= "*";
            }
            $espacios--;
            $asteriscos+=2;
            $retorno .= "<br>";
        }
        
        $retorno.= "</p>";
        return $retorno;
    }

    public function __ToString(){
        return parent::__ToString()."Base: ".$this->_base."<br>Altura: ".$this->_altura.$this->Dibujar();
    }
}




$tri = new Triangulo(5, 3);
$tri->SetColor("red");
echo($tri);
$tri->SetColor("green");
echo($tri);

$rec = new Rectangulo(15, 4);
$rec->SetColor("red");
echo($rec);
$rec->SetColor("green");
echo($rec);

?>