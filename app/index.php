<?php
include_once("PHP/Objetos/Persona.php");
include_once("PHP/Clases/Archivos.php");

//$var = $_GET["opcion"];
$var = 9;
$file_name = "Archivos/ListaPersonas.txt";

echo "Agregar a la url /Clase2/";

if($var == 0)
{
    $arrayHarcodeado = LeerArchivo("Archivos/PersonasHarcodeadas.txt");
    EscribirArchivo($file_name, $arrayHarcodeado);
}
else if($var == 1)
{        
    $persona = Persona("Josias", "Rivola", "26", "Masculino");
    EscribirArchivo($file_name, $persona);
}
else if ($var == 2)
{
    $array = LeerArchivo($file_name);
    foreach ($array as $key => $value) {
        MostrarKeyValue($value);
        printf("////////////////////////////////////<br/>");
    }
}

function Algo()
{
    printf("LLEGUE");
}

function MostrarValue($obj){
    foreach ($obj as $value) {
        printf("$value<br/>");
    }
}

function MostrarKeyValue($obj){
    foreach ($obj as $key => $value) {
        printf("$key = $value<br/>");
    }
}

?>
