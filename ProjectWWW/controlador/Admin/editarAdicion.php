<?php

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$plato = $_POST['plato_id'];
session_start();
$adicional_id = $_SESSION['$adicional_id'];

if ($descripcion != " " &&
        $nombre != " " &&
        $costo != " " &&
        $plato != " ") {

    include_once ('../../serverPages/ConexionDB.php');
    $db = getDB();
    $update = "UPDATE adicional SET plato_id='" . $plato . "', nombre='" . $nombre . "', descripcion='" . $descripcion . "' , costo='" . $costo . "' WHERE adicional_id='" . $adicional_id . "'";
    //print_r($update);
    //throw Exception($update);
    $result = pg_query($db, $update);
    closeDB($db);
    $message = "Datos actualizados correctamente";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Location: ../../templates/Admin/selExtraEditar.php');
} else {
    echo "<script language='JavaScript'>
  alert('Error de Creación');</script>";
}
?>
