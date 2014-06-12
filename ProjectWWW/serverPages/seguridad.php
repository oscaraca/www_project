<?php
//Inicio la sesión 
session_start();
//throw new Exception("AQUI".$_SESSION["autentificado"]."AQUI");
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
if ($_SESSION["autentificado"] != "SI") {
    //si no existe, envio a la página de autentificacion 
    //  throw new Exception("AQUI".$_SESSION["autentificado"]."AQUI");
    header("Location: ../../templates/index.php");
    //ademas salgo de este script 
    exit();
}
?>
