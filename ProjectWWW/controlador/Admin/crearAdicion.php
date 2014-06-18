<?php

$nombre = trim($_POST['nombre']);
$descripcion = trim($_POST['descripcion']);
$costo = $_POST['costo'];
$plato = trim($_POST['plato_id']);
$arraytid = explode(" ", $plato);
//print_r($arraytid);
$primer = $arraytid{0};

if ($nombre != " " &&
        $descripcion != " " &&
        $primer != " " &&
        $costo != " ") {

    include_once ('../../serverPages/ConexionDB.php');
    $db = getDB();
    $query = "INSERT INTO adicional (plato_id, nombre, descripcion, costo)  VALUES ('" . $primer . "', '" . $nombre . "', '" . $descripcion . "', '" . $costo . "')";
    try {
    //print_r($query);
    //Throw Exception($query);
    pg_query($db, $query);
    closeDB($db);
    header('Location: ../../templates/Admin/crearExtraTemplateAdmin.php?creacion=si');
    } catch (Exception $e) {
        echo 'Excepción capturada: ', $e->getMessage(), "\n";
    }
} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
?>