<?php
$nombrePlato = trim($_POST['nombre']);
$ingredientesPlato = trim($_POST['ingredientes']);
$fechaCreacionPlato = trim($_POST['fechaCreacion']);
$fotoPlato = trim($_POST['logo']);
$estadoPlato = trim($_POST['estado']);
$costoPlato = $_POST['costo'];
session_start();
$tid = $_SESSION['tida'];

if ($fechaCreacionPlato == ""){
 	$fechaCreacionPlato= date("Y-m-d");
 }

if ($nombrePlato != " " &&
        $costoPlato != " " &&
        $ingredientesPlato != " " &&
        $fechaCreacionPlato != " " &&
        $fotoPlato != " " &&
        $estadoPlato != " ") {

    include_once ('../../serverPages/ConexionDB.php');
    $db = getDB();
    $query = "INSERT INTO plato (tid, nombre, ingredientes, estado, fecha, costo, logo)  VALUES ('" . $tid . "', '" . $nombrePlato . "', '" . $ingredientesPlato . "', '" . $estadoPlato . "', '" . $fechaCreacionPlato . "', '" . $costoPlato . "', '" . $fotoPlato . "')";
    try {
        //print_r($query);
        //Throw Exception($query);
        pg_query($db, $query);
        closeDB($db);
        header('Location: ../../templates/Admin/crearPlatoTemplateAdmin.php?creacion=si');
    } catch (Exception $e) {
        echo 'Excepción capturada: ', $e->getMessage(), "\n";
    }
} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
?>