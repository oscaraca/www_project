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

    include_once ('../../serverPages/ConexionDB.php');
    $db = getDB();  
    $data  = file_get_contents($logo);
    $image = pg_escape_bytea($data);
    $result = "INSERT INTO tenant (nombre, url, direccion, telefonos, logo) VALUES ('" . $nombre . "', '" . $url . "', '" . $direccion . "', '" . $telefono . "', '" . $image . "')";   
    pg_query($db, $result);
    closeDB($db);
    

    header('Location: ../../templates/Administrador/empresa.php?var=si');
} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
?>

