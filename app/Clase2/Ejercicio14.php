<?php
/*
Rivola Josias
Aplicación Nº 14 (Par e impar)
Crear una función llamada esPar que reciba un valor entero como parámetro y devuelva TRUE
si este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función esImpar.
*/

echo("Es Par: ".EsPar(3)."<br>");
echo("Es Impar: ".EsImpar(3)."<br>");
echo "<br>";

echo("Es Par: ".EsPar(4)."<br>");
echo("Es Impar: ".EsImpar(4)."<br>");


function EsPar($num)
{   
    return ($num%2==0) ? "TRUE" : "FALSE";
}
function EsImpar($num)
{   
    return (EsPar($num) == "TRUE") ? "FALSE" : "TRUE";
}


?>