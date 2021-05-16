<?php

include("Empleado.php");

if (isset($_POST["Nombre"]) && isset($_POST["pass"])) {
    $u = new Empleado($_POST["Nombre"], $_POST["pass"]);
    $u->ValidarUser();
}
?>
