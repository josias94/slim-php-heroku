<?php

class Punto{
    private $_x;
    private $_y;

    public function __construct($x, $y){
        $this->_x = $x;
        $this->_y = $y;
    }

    public function GetX(){
        return $this->_x;
    }

    public function GetY(){
        return $this->_y;
    }
}

class Rectangulo{
    private $_vertice1;
    private $_vertice2;
    private $_vertice3;
    private $_vertice4;
    private $area;
    private $ladoDos;
    private $ladoUno;
    private $perimetro;

    public function __construct($v1, $v3){
        $this->_vertice1 = $v1;
        $this->_vertice2 = new Punto($v1->GetX(), $v3->GetY());
        $this->_vertice3 = $v3;
        $this->_vertice4 = new Punto($v3->GetX(), $v1->GetY());
        $this->ladoDos = $v3->GetY() - $v1->GetY() + 1;
        $this->ladoUno = $v3->GetX() - $v1->GetX() + 1;
        $this->perimetro = $this->ladoUno*2 + $this->ladoDos*2;
        $this->area = $this->ladoUno*$this->ladoDos;
    }

    public function Dibujar(){                
        $y = $this->_vertice1->GetY() * 10;
        $x = $this->_vertice1->GetX() * 10;   
    
        $retorno = "<p style=position:absolute;top:$y%;left:$x%;>";
        $columnas = $this->ladoUno;
        $filas = $this->ladoDos;

        for ($j=0; $j < $filas ; $j++) {             
            for ($i=0; $i < $columnas; $i++) { 
                if($i == 0 || $i == $columnas-1 || $j == 0 || $j == $filas - 1){
                    $retorno .= "*&nbsp;";
                }
                else{
                    $retorno .= "&nbsp;&nbsp;&nbsp;";
                }                
            }         
            $retorno .= "<br>";
        }
        $retorno.= "</p>";        
        return $retorno;        
    }

    public function __toString(){
        return $this->Dibujar();
    }
}

$rec = new Rectangulo(new Punto(1,2), new Punto(15,6));
$rec2 = new Rectangulo(new Punto(5,3), new Punto(20,9));
echo($rec);
echo($rec2);

?>