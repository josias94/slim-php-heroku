<?php
/*Rivola Josias
Aplicación Nº 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
carga los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en las clases*/
include_once("Usuario.php");
include_once("Producto.php");

if (isset($_POST["codBarra"]) && isset($_POST["idUsuario"]) && isset($_POST["cantItems"])){
    $usuario = Usuario::BuscarPorId($_POST["idUsuario"]);
}
else{
    http_response_code(404);
    echo "Faltan Datos";
}

?>