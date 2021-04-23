<?php
/*
Rivola Josias
Aplicación Nº 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
crear un dato con la fecha de registro , toma todos los datos y utilizar sus métodos para
poder hacer el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
*/
include("Usuario.php");

if (isset($_POST["nombre"]) && isset($_POST["pass"]) && isset($_POST["mail"])) {        

    $u = new Usuario();
    $u->_nombre = $_POST["nombre"];
    $u->_apellido = $_POST["apellido"];
    $u->_clave = $_POST["pass"];
    $u->_email = $_POST["mail"];
    $u->_localidad = $_POST["localidad"];
    $u->_fechaDeRegistro = date("Y-m-d");

    echo $u->Insert();
    
    // $destino = "Usuarios/Fotos/".$_POST["nombre"];
    // $backup = "Usuarios/Fotos/VA/".$_POST["nombre"];
    // MoveFile($_FILES["fotoUsuario"], $destino, $backup);
}
else{
    http_response_code(404);
    echo "Faltan Datos";
}
?>
