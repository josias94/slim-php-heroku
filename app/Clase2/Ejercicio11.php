<?php
/*
Rivola Josias
Aplicación Nº 11 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los
números del uno 1 al 4 (hacer una función
que las calcule invocando la función pow).
*/
for ($i=1; $i < 5; $i++) { 
    for ($j=1; $j < 5; $j++) { 
        echo($i);
        echo("E");
        echo("$j: ");
        echo pow($i,$j);    
        echo("<br>");
    }    
}
?>