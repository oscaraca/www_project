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

    include_once '../serverPages/ConexionDB.php';
    $query = "SELECT COUNT(tid) AS num FROM tenant";
    $result1 = pg_query(getDB(), $query);
    $row1 = pg_fetch_array($result1);
    $var1 = $row1["num"];
    $sec = $var1 + 1;

    $result = "INSERT INTO tenant (tid,nombre, url, direccion, telefonos, logo) VALUES ('" . $sec . "','" . $nombre . "', '" . $url . "', '" . $direccion . "', '" . $telefono . "', '" . $logo . "')";
    pg_query(getDB(), $result);
    closeDB(getDB());

    header('Location: ../templates/empresa.php?var=si');
} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
?>

