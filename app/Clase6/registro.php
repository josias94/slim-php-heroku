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
include("Usuario.php");

if (isset($_POST["nombre"]) && isset($_POST["pass"]) && isset($_POST["mail"])) {        
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $clave = $_POST["pass"];
    $email = $_POST["mail"];
    $localidad = $_POST["localidad"];
    $fecha = date("Y-m-d");
    Usuario::Insert($nombre, $apellido, $clave, $email, $localidad, $fecha);
    // $destino = "Usuarios/Fotos/".$_POST["nombre"];
    // $backup = "Usuarios/Fotos/VA/".$_POST["nombre"];
    // MoveFile($_FILES["fotoUsuario"], $destino, $backup);
}
else{
    http_response_code(404);
    echo "Faltan Datos";
}
?>
