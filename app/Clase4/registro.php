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

//var_dump($_FILES);


if (isset($_POST["usuario"]) && isset($_POST["pass"]) && isset($_POST["mail"])) {    
    $u = new Usuario($_POST["usuario"], $_POST["pass"], $_POST["mail"]);
    //$u->AltaJSON();
    


    $tipo = explode(".",$_FILES["fotoUsuario"]["name"]);
    $destino = "Fotos/".$_POST["usuario"].".".$tipo[1];
    
    $Va = "Fotos/VA/".$_POST["usuario"].date("d-m-Y-H-i-s").".".$tipo[1];

    if(file_exists($destino)){        
        rename($destino, $Va);
    }
    
    move_uploaded_file($_FILES["fotoUsuario"]["tmp_name"], $destino);

} 
?>
