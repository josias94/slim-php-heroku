<?php
include("Usuario.php");

if (isset($_GET["listado"])) {

    if($_GET["listado"] == "usuarios"){
        echo Usuario::Listar();
    }
    
}

if (isset($_POST["usuario"]) && isset($_POST["pass"]) && isset($_POST["mail"])) {
    $u = new Usuario($_POST["usuario"], $_POST["pass"], $_POST["mail"]);
    $u->Alta();
} elseif (isset($_POST["usuario"]) && isset($_POST["pass"])) {
    $u = new Usuario($_POST["usuario"], $_POST["pass"]);
    $u->ValidarUser();
}