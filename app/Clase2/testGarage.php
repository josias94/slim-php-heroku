<?php
require("Ejercicio18.php");

$a1 = new Auto("Rojo","Mercedez");
$a2 = new Auto("Rojo","Mercedez");
$a3 = new Auto("Azul","Mercedez");

echo("<br>//////////////Constructor con 2 parametros///////////////<br>");
$gar1 = new Garage("Ejemplo1", 10);
$gar1->MostrarGarage();

echo("<br>//////////////Constructor con 1 parametro///////////////<br>");
$gar2 = new Garage("Ejemplo 2");
$gar2->MostrarGarage();

echo("<br>///////////////Equals sin elemento//////////////////<br>");
var_dump($gar1->Equals($a1));

echo("<br>///////////////Equals con elemento//////////////////<br>");
$gar1->Add($a1);
var_dump($gar1->Equals($a1));

echo("<br>///////////////Se intenta agregar elemento ya existente//////////////////<br>");
$gar1->Add($a1);

echo("<br>///////////////Se intenta remover elemento que no existe//////////////////<br>");
$gar1->Remove($a2);

echo("<br>///////////////////Se agrega auto Azul y Rojo////////////////////<br>");
$gar1->Add($a2);
$gar1->Add($a3);
$gar1->MostrarGarage();
echo("<br>/////////////Se elimina auto Azul y se lista///////////<br>");
$gar1->Remove($a3);
$gar1->MostrarGarage();
echo("//////////////////////////////////////////////////////////<br>");

?>