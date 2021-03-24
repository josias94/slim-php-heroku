<?php
/*
Rivola Josias
Aplicación Nº 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array 
de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/
function($array)
{

    $invertido = array_reverse($array);
    echo $array."<br>";
    echo $invertido;
    
}
?>