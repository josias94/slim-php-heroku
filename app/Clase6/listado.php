<?php
/*
Rivola Josias
Aplicación Nº 28 ( Listado BD)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,ventas)
cada objeto o clase tendrán los métodos para responder a la petición
devolviendo un listado <ul> o tabla de html <table>
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