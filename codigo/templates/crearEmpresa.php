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
    $direccion != " "){
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=eat user=postgres password=cobain") or die('Could not connect: ' . pg_last_error());
    $result = "INSERT INTO empresa VALUES ('" . $nombre . "', '" . $logo . "', '" . $url . "', '" . $telefono . "', '" . $direccion . "')";
    pg_query($dbconn, $result);
    pg_close($dbconn);

    header('Location: empresa.php?creacion=si');
} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
include ('CerrarConexionBD.php');
?>

