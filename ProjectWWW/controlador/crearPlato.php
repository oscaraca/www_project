<?php

$nombrePlato = trim($_POST['nombre']);
$ingredientesPlato = trim($_POST['ingredientes']);
$fechaCreacionPlato = trim($_POST['fechaCreacion']);
$fotoPlato = trim($_POST['foto']);
$estadoPlato = trim($_POST['estado']);
$costoPlato = $_POST['costo'];
$empresa = "";

if ($nombrePlato != " " &&
        $costoPlato != " " &&
        $ingredientesPlato != " " &&
        $fechaCreacionPlato != " " &&
        $fotoPlato != " " &&
        $estadoPlato != " ") {

    include_once '../serverPages/ConexionDB.php';
    $result = "INSERT INTO platos  VALUES ('" . $empresa . "', '" . $nombrePlato . "', '" . $codigoPlato . "', '" . $ingredientesPlato . "', '" . $fechaCreacionPlato . "', '" . $fotoPlato . "', '" . $estadoPlato . "')";
    try {
        pg_query(getDB(), $result);
        closeDB(getDB());
        header('Location: ../templates/plato.php?creacion=si');
    } catch (Exception $e) {
        echo 'Excepción capturada: ', $e->getMessage(), "\n";
    }
} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
?>