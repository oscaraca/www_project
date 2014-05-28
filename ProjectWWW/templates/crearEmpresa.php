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
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=eat user=postgres password=12345") or die('Could not connect: ' . pg_last_error());
    $query = "SELECT COUNT(tid) AS num FROM tenant";
    $result1 = pg_query($dbconn, $query);
    $row1 = pg_fetch_array($result1);
    $var1 = $row1["num"];
    $sec = $var1 + 1;     
    
    $result = "INSERT INTO tenant (tid,nombre, url, direccion, telefonos, logo) VALUES ('" . $sec. "','" . $nombre . "', '" . $url . "', '" . $direccion . "', '" . $telefono . "', '" . $logo . "')";
    pg_query($dbconn, $result);
    pg_close($dbconn);

    header('Location: empresa.php');
} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
include ('CerrarConexionBD.php');
?>

