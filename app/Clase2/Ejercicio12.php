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

 //Invertir("HOLA");


function Invertir($origin)
{
    for ($i=0; $i < strlen($origin); $i++) { 
        echo($origin[$i]."<br>");
    }
}
    
    
    
}
?>