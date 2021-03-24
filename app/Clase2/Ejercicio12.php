<?php
/*
Rivola Josias
Aplicación Nº 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array 
de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

$var = ["H","O","L","A"];

InvertirString("HOLA");
echo "<br>";
InvertirArrayChar($var);

function InvertirString($origin)
{
    $invertido = "";
    for ($i=strlen($origin)-1; $i >= 0; $i--) { 
        $invertido .= $origin[$i];
    }
    echo $origin."<br>";
    echo $invertido;
}

function InvertirArrayChar($origin)
{
	$invertido = array_reverse($origin);    
    foreach($invertido as $value)
	{
		echo $value;
	}
	echo "<br>";
    foreach($origin as $value)
	{
		echo $value;
	}
}
?>