<?php
include("Ejercicio17.php");

$a1 = new Auto("Rojo","Mercedez");
$a2 = new Auto("Azul","Mercedez");

$a3 = new Auto("Verde","Mercedez",12);
$a4 = new Auto("Verde","Mercedez",15.5);

$a5 = new Auto("Verde","Mercedez",15.7, "23/03/2021 00:00:00");


$a3->AgregarImpuestos(1500);
$a4->AgregarImpuestos(1500);
$a5->AgregarImpuestos(1500);

printf("ADD: ". Auto::Add($a1,$a2)."<br>");
printf("Equals: ".Auto::Equals($a1,$a2)."<br>");
echo("<br>Auto1<br>");
Auto::MostrarAuto($a1);
echo("<br>Auto3<br>");
Auto::MostrarAuto($a3);
echo("<br>Auto5<br>");
Auto::MostrarAuto($a5);

?>
