<?php

include("Producto.php");


if (isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"])
    && isset($_POST["precio"]) && isset($_POST["codBarra"])) { 

    $u = new Producto($_POST["nombre"], $_POST["tipo"], $_POST["stock"], $_POST["precio"], $_POST["codBarra"]);    
    $u->AltaJSON();

    if(isset($_FILES["fotoProducto"])){
        $destino = "Productos/Fotos/".$_POST["codBarra"];
        $backup = "Productos/Fotos/VA/".$_POST["codBarra"];
        //echo (MoveFile($_FILES["fotoProducto"], $destino, $backup))? "Se agrego la imagen correctamente" : "Fallo al agregar imagen";
        MoveFile($_FILES["fotoProducto"], $destino, $backup);
    }    
}
else{
    http_response_code(404);
    echo "Faltan Datos";
}


?>