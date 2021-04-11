<?php
/*
Rivola Josias
Aplicación Nº 25 ( AltaProducto)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
crear un objeto y utilizar sus métodos para poder verificar si es un producto existente,
si ya existe el producto se le suma el stock , de lo contrario se agrega al documento en un nuevo renglón
Retorna un : “Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/
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