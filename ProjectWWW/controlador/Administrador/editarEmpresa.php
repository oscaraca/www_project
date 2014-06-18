<?php

$nombre = trim($_POST['nombre']);
$logo = trim($_POST['logo']);
$url = trim($_POST['url']);
$direccion = trim($_POST['direccion']);
$telefono = trim($_POST['tel']);
session_start();
$tid = $_SESSION['tid'];

if ($nombre != " " &&
        $logo != " " &&
        $url != " " &&
        $telefono != " " &&
        $direccion != " ") {

    include_once('../../serverPages/ConexionDB.php');
    $db = getDB();
    $update = "UPDATE tenant SET nombre='" . $nombre . "', url='" . $url . "' , direccion='" . $direccion . "' , telefonos='" . $telefono . "', logo='" . $logo . "'
        WHERE tid='" . $tid . "'";
    //print_r($update);
    //throw Exception($update);
    pg_query($db, $update);
    closeDB($db);
    $message = "Datos actualizados correctamente";
    
   // header('Location: ../../templates/Administrador/editarEmpresaTemplateAdministrador.php?var=si');
     header('Location: ../../templates/Administrador/selEmpresaEditar.php');
     echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
?>
