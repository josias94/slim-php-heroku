<?php
/*
Rivola Josias
Aplicación No 27 (Registro BD)
Archivo: registro.php
método:POST
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos la base de datos
retorna si se pudo agregar o no.
*/
include("Empleado.php");

if (isset($_POST["nombre"]) && isset($_POST["pass"]) && isset($_POST["mail"])) {        

    $u = new Empleado();
    $u->_nombre = $_POST["nombre"];
    $u->_apellido = $_POST["apellido"];
    $u->_clave = $_POST["pass"];
    $u->_email = $_POST["mail"];
    $u->_localidad = $_POST["localidad"];
    $u->_fechaDeRegistro = date("Y-m-d");

    echo $u->Insert();
}
else{
    http_response_code(404);
    echo "Faltan Datos";
}
?>
