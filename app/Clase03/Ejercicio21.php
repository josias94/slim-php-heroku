<?php
include("Usuario.php");

if (isset($_GET["listado"])) {

    if($_GET["listado"] == "usuarios"){
        ListarUsuarios();
    }
    
}

if (isset($_POST["usuario"]) && isset($_POST["pass"]) && isset($_POST["mail"])) {
    $u = new Usuario($_POST["usuario"], $_POST["pass"], $_POST["mail"]);
    $u->Alta();
} elseif (isset($_POST["usuario"]) && isset($_POST["pass"])) {
    $u = new Usuario($_POST["usuario"], $_POST["pass"]);
    $u->ValidarUser();
}





function ListarUsuarios(){
    $array = LeerArchivoTxt("Usuarios.csv");
    $mostrar = "<ul>";
    foreach ($array as $value) {        
        $obj = explode(",", $value);
        $usuario = new Usuario($obj[0], $obj[1], $obj[2]);
        $mostrar .= "<li>".$usuario."</li><br>"; 
        // foreach ($obj as $atributo) {
        //     $mostrar .= "<li>".$atributo."</li><br>";
        // }        
    }
    $mostrar .= "</ul>";
    echo $mostrar;
}
