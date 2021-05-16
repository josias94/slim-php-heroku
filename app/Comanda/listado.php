<?php

include("Empleado.php");
include("Producto.php");

if (isset($_GET["listado"])) {

    if($_GET["listado"] == "Empleado"){
        if(isset($_GET["id"])){
            Empleado::SelectAll($_GET["id"]);
        }
        else{
            Empleado::SelectAll();
        }
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