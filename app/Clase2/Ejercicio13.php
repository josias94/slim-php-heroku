<?php
/*
Rivola Josias
Aplicación Nº 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
*/

echo(ValidarPalabra("Recuperatorio", 1)."<br>");
echo(ValidarPalabra("Recuperatorio", 100)."<br>");
echo(ValidarPalabra("Parcial", 100)."<br>");
echo(ValidarPalabra("Programacion", 100)."<br>");
echo(ValidarPalabra("otraCosa", 1)."<br>");
echo(ValidarPalabra("otraCosa", 100)."<br>");


function ValidarPalabra($palabra, $max)
{    
    if(strlen($palabra) > $max){
        $retorno = "el largo de la palabra  <strong>\"$palabra\"</strong> es mayor al permitido";
    }
    else{
        switch ($palabra) {
            case "Recuperatorio":
            case "Parcial":
            case "Programacion":
                $retorno = 1;    
                break;            
            default:
                $retorno = 0;
                break;
        }
    }
    return $retorno;
}


?>