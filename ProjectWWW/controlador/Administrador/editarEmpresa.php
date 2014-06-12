<?php

$nombre = trim($_POST['nombre']);
$logo = trim($_POST['logo']);
$url = trim($_POST['url']);
$direccion = trim($_POST['direccion']);
$telefono = trim($_POST['tel']);

if ($nombre != " " &&
        $logo != " " &&
        $url != " " &&
        $telefono != " " &&
        $direccion != " ") {
    
    include ('../../serverPages/ConexionDB.php');    
    $db = getDB();
    
    closeDB($db);

    header('Location: ../../templates/Administrador/empresa.php?var=si');
} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
?>
