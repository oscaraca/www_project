<?php

$empresa=trim($_POST['radioButton']);
$nombrePlato = trim($_POST['nombrePlato']);
$codigoPlato = trim($_POST['codigoPlato']);
$ingredientesPlato = trim($_POST['ingredientesPlato']);
$fechaCreacionPlato = trim($_POST['fechaCreacionPlato']);
$fotoPlato = trim($_POST['fotoPlato']);
$estadoPlato = trim($_POST['estado']);

if ($empresa != " " &&
    $nombrePlato != " " &&
    $codigoPlato != " " &&
    $ingredientesPlato != " " &&    
    $fechaCreacionPlato != " " &&  
    $fotoPlato != " " &&  
    $estadoPlato != " "){
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=eat user=postgres password=cobain") or die('Could not connect: ' . pg_last_error());
    $result = "INSERT INTO platos  VALUES ('" . $empresa . "', '" . $nombrePlato . "', '" . $codigoPlato . "', '" . $ingredientesPlato . "', '" . $fechaCreacionPlato."', '". $fotoPlato."', '" . $estadoPlato . "')";
    echo $result;   
    try {
        pg_query($dbconn, $result);
         pg_close($dbconn);
         header('Location: plato.php?creacion=si');
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}      

} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
include ('CerrarConexionBD.php');

?>