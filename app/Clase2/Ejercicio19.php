<?php
/*
Rivola Josias
Aplicación Nº 19 (Pasajero - Vuelo)
Dadas las siguientes clases:
Pasajero
Atributos privados: _apellido (string), _nombre (string), _dni (string), _esPlus (boolean)
Crear un constructor capaz de recibir los cuatro parámetros.
Crear el método de instancia “Equals” que permita comparar dos objetos Pasajero. Retornará
TRUE cuando los _dni sean iguales.
Agregar un método getter llamado GetInfoPasajero, que retornará una cadena de caracteres
con los atributos concatenados del objeto.
Agregar un método de clase llamado MostrarPasajero que mostrará los atributos en la página.
Vuelo
Atributos privados: _fecha (DateTime), _empresa (string) _precio (double), _listaDePasajeros
(array de tipo Pasajero), _cantMaxima (int; con su getter). Tanto _listaDePasajero como
_cantMaxima sólo se inicializarán en el constructor.
Crear el constructor capaz de que de poder instanciar objetos pasándole como parámetros:
i. La empresa y el precio.
ii. La empresa, el precio y la cantidad máxima de pasajeros.
Agregar un método getter, que devuelva en una cadena de caracteres toda la información de
un vuelo: fecha, empresa, precio, cantidad máxima de pasajeros, y toda la información de
todos los pasajeros.
Crear un método de instancia llamado AgregarPasajero, en el caso que no exista en la lista,
se agregará (utilizar Equals). Además tener en cuenta la capacidad del vuelo. El valor de
retorno de este método indicará si se agregó o no.
Agregar un método de instancia llamado MostrarVuelo, que mostrará la información de un
vuelo.
Crear el método de clase “Add” para que permita sumar dos vuelos. El valor devuelto deberá
ser de tipo numérico, y representará el valor recaudado por los vuelos. Tener en cuenta que si
un pasajero es Plus, se le hará un descuento del 20% en el precio del vuelo.
Crear el método de clase “Remove”, que permite quitar un pasajero de un vuelo, siempre y
cuando el pasajero esté en dicho vuelo, caso contrario, informarlo. El método retornará un
objeto de tipo Vuelo.
*/
class Pasajero{

    private $_apellido;
    private $_nombre;
    private $_dni;
    private $_esPlus;

    function __construct($apellido, $nombre, $dni, $esPlus){
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        $this->_dni = $dni;
        $this->_esPlus = $esPlus;
    }

    public function Equals($otro){
        return ($this->_dni == $otro->_dni);
    }

    public function GetInfoPasajero(){
        $retorno = "Apellido: $this->_apellido<br>";
        $retorno .= "Nombre: $this->_nombre<br>";
        $retorno .= "DNI: $this->_dni<br>";
        $retorno .= "Plus: ";
        $retorno .= $this->_esPlus == true ? "Si":"No";
        return $retorno."<br>";
    }

    public static function MostrarPasajero($pasajero)
    {
        echo ($pasajero->GetInfoPasajero()."<br>");
    }
}

class Vuelo{
    private $_fecha;
    private $_empresa;
    private $_precio;
    private $_listaDePasajeros;
    private $_cantMaxima;

    function __construct($empresa, $precio, $cantMax = null){
        $this->_fecha = date("d/m/Y H:i:s");
        $this->_empresa = $empresa;
        $this->_precio = $precio;
        $this->_listaDePasajeros = [];
        if($cantMax != null){
            $this->_cantMaxima = $cantMax;
        }
        else{
            $this->_cantMaxima = 1;
        }        
    }

    public function Get(){
        $retorno = "Empresa: $this->_empresa<br>";
        $retorno .= "Cantidad Maxima: $this->_cantMaxima<br>";
        $retorno .= "Precio: $this->_precio<br>";
        $retorno .= "Fecha: $this->_fecha<br>";
        
        if(count($this->_listaDePasajeros) > 0){
            $retorno .= "Lista de pasajeros:<br><br>";
        }
        foreach ($this->_listaDePasajeros as $pasajero){
            $retorno .= $pasajero->GetInfoPasajero()."<br>";
        }
        return $retorno;        
    }

    public function AgregarPasajero($pasajero){
        $existe = 0;
        if(count($this->_listaDePasajeros) < $this->_cantMaxima){
            if(count($this->_listaDePasajeros) == 0){
                array_push($this->_listaDePasajeros, $pasajero);
                return true;
            }
            else{
                foreach ($this->_listaDePasajeros as $value) {
                    if($value->Equals($pasajero)){
                        $existe = 1;
                        echo "El pasajero ya se encuentra en el vuelo<br>";                        
                    }
                }
                if(!$existe){
                    array_push($this->_listaDePasajeros, $pasajero);
                    return true;
                } 
            }            
        }
        else{
            echo "Cantidad maxima alcanzada<br>";
        }
        return false;
    }
    
    public function MostrarVuelo(){
        echo $this->Get();
    }

    public static function Add($v1, $v2){
        $retorno = 0;
        foreach ($v1->_listaDePasajeros as $p) {            
            $i = strrpos($p->GetInfoPasajero(),"Plus: ");
            $esPlus = substr($p->GetInfoPasajero(), $i + 6, 2);            
            if($esPlus == "Si"){
                $retorno += $v1->_precio * 0.8;
            }
            else{
                $retorno += $v1->_precio;
            }
        }
        foreach ($v2->_listaDePasajeros as $p) {            
            $i = strrpos($p->GetInfoPasajero(),"Plus: ");
            $esPlus = substr($p->GetInfoPasajero(), $i + 6, 2);            
            if($esPlus == "Si"){
                $retorno += $v2->_precio * 0.8;
            }
            else{
                $retorno += $v2->_precio;
            }
        }
        return $retorno;
    }

    public static function Remove($v, $p){
        $existe = 0;
        foreach ($v->_listaDePasajeros as $value) {
            if($value->Equals($p)){
                $existe = 1;                
            }
        }
        if($existe == 1){
            $i = array_search($p, $v->_listaDePasajeros, true);
            unset($v->_listaDePasajeros[$i]);
            echo "El pasajero ah sido eyectado correctamente<br>";
            echo "<img src='https://i.postimg.cc/tTtNrtQW/zeyecc.jpg' width='200' height='200'>";
        }                            
        else{
            echo "El pasajero no estaba en el vuelo o habia sido eyectado anteriormente <br>";
        }
        return $v;
    }
}

$p1 = new Pasajero("AAAAA", "aaaaa", 10000000, false);
$p2 = new Pasajero("BBBBB", "bbbbb", 10000001, true);
$p3 = new Pasajero("CCCCC", "ccccc", 10000000, true);
$p4 = new Pasajero("DDDDD", "ddddd", 10000002, false);

$v1 = new Vuelo("Aerolineas Wacanda", 1000,5);
$v2 = new Vuelo("Aerolineas Atlantis", 500,5);

$v1->AgregarPasajero($p1);
$v1->AgregarPasajero($p2);
$v2->AgregarPasajero($p3);
$v2->AgregarPasajero($p4);
echo("//////////////MostrarVuelo v1///////////////////////<br>");
$v1->MostrarVuelo();
echo("//////////////MostrarVuelo v2///////////////////////<br>");
$v2->MostrarVuelo();
echo("///////////////////////////////////////////////////////<br>");

echo ("La suma del vuelo v1 y v2 es: ".Vuelo::Add($v1, $v2)."<br>");
echo "<br>";
echo("/////////////Remove p1//////////////////////////<br>");
Vuelo::Remove($v1,$p1);
echo "<br>";
echo("/////////////Remove p1 nuevamente//////////////////////<br>");
Vuelo::Remove($v1,$p1);
echo "<br>";
echo("/////////////Remove p3 (No Existe)/////////////////////<br>");
Vuelo::Remove($v1,$p3);
echo "<br>";
echo("////////////Mostrar vuelo despues del remove///////////////////////<br>");
$v1->MostrarVuelo();


?>