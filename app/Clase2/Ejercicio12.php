<?php
/*
Rivola Josias
Aplicación Nº 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array 
de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

$var = "HOLA";
echo $var[0];
 //Invertir("HOLA");


function Invertir($array)
{
foreach ($array as  $value) {
    echo $value;
    echo "<br>";
}
    
    
    
}
?>