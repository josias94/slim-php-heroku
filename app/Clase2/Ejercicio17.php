<?php
/*
Rivola Josias
Aplicación Nº 17 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:
_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.
Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double
con la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)
*/

$a1 = new Auto("Rojo","Mercedez");
$a2 = new Auto("Azul","Mercedez");

$a3 = new Auto("Verde","Mercedez",12);
$a4 = new Auto("Verde","Mercedez",15.5);

$a5 = new Auto("Verde","Mercedez",15.0, "23/03/2021 00:00:00");


$a3->AgregarImpuestos(1500);
$a4->AgregarImpuestos(1500);
$a5->AgregarImpuestos(1500);
echo("ADD<br>");
printf(Auto::Add($a1,$a2));

printf(Auto::Equals($a1,$a2));

echo("Auto1<br>");
Auto::MostrarAuto($a1);
echo("Auto2<br>");
Auto::MostrarAuto($a2);
echo("Auto3<br>");
Auto::MostrarAuto($a3);
echo("Auto4<br>");
Auto::MostrarAuto($a4);
echo("Auto5<br>");
Auto::MostrarAuto($a5);








class Auto{
    
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    function __construct($color, $marca, $precio = 0, $fecha = null){
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_marca = $marca;
        if($fecha == null){
            $this->_fecha = date("d/m/Y H:i:s");
        }
        else{
            $this->_fecha = $fecha;
        }
        
    }
	
    function AgregarImpuestos($agregado){
        $this->_precio += $agregado;      
    }
	
    function MostrarAuto($a1)
    {
        foreach ($a1 as $key => $value) {
            echo("$key: $value<br>");
        }
    }

    static function  Equals($auto1, $auto2){
        return ($auto1->_marca == $auto2->marca);
    }

    function Add($autoUno,$autoDos)
    {
        $retorno = 0;
        if(Auto.Equals($autoUno,$autoDos) && $autoUno->_color == $autoDos->_color)
        {
            $retorno = $autoUno->_precio + $autoDos->_precio;
        }
        return $retorno;
    }

}


?>