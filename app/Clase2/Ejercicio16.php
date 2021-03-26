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
        $this->_vertice3 = $v3;
    }

    public function Dibujar(){

    }
}

?>