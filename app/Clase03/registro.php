<?php
/*
Rivola Josias
Aplicación Nº 20 (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario
*/
include("Usuario.php");


if (isset($_POST["usuario"]) && isset($_POST["pass"]) && isset($_POST["mail"])) {
    $u = new Usuario($_POST["usuario"], $_POST["pass"], $_POST["mail"]);
    $u->Alta();    
} 
?>
