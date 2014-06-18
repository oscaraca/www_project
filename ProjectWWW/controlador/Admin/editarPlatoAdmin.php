<?php

$nombre = $_POST['nombre'];
$ingredientes = $_POST['ingredientes'];
$costo = $_POST['costo'];
$fecha = $_POST['fecha'];
$estado = $_POST['estado'];
session_start();
$plato_id = $_SESSION['plato_ide'];

if ($ingredientes != " " &&
        $nombre != " " &&
        $costo != " " &&
        $fecha != " " &&
        $estado != " ") {

    include_once ('../../serverPages/ConexionDB.php');
    $db = getDB();
    $update = "UPDATE plato SET nombre='" . $nombre . "', ingredientes='" . $ingredientes . "' , estado='" . $estado . "' , fecha='" . $fecha . "', costo='" . $costo . "' WHERE plato_id='" . $plato_id . "'";
    //print_r($update);
    //throw Exception($update);
    $result = pg_query($db, $update);
    closeDB($db);
    $message = "Datos actualizados correctamente";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Location: ../../templates/Admin/selPlatoEditar.php');
} else {
    echo "<script language='JavaScript'>
  alert('Error de Creación');</script>";
}
?>
