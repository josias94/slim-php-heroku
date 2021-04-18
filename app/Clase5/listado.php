<?php
/*
Rivola Josias
Aplicación Nº 24 ( Listado JSON y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.json.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>apellido, nombre,foto</li>
<li>apellido, nombre,foto</li>
</ul>
Hacer los métodos necesarios en la clase usuario
 */
include("Usuario.php");
include("Producto.php");

if (isset($_GET["listado"])) {

    if($_GET["listado"] == "usuarios"){
        if(isset($_GET["id"])){
            Usuario::SelectAll($_GET["id"]);
        }
        else{
            Usuario::SelectAll();
        }        
        // echo Usuario::ListarJSON();
    }
    elseif($_GET["listado"] == "productos"){
        echo Producto::ListarJSON();
    }    
}
else{
    http_response_code(404);
    echo "Faltan Datos";
}
?>