<?php
$usuario = $_POST['username'];
$password = $_POST['pass'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$correo = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['tel'];
$identificacion = $_POST['ide'];
$tipo_usuario = $_POST['tipo_usuario'];
session_start();
$tid = $_SESSION['tida'];
if ($usuario != " " &&
        $nombre != " " &&
        $apellido != " " &&
        $password != " " &&
        $correo != " " &&
        $telefono != " " &&
        $identificacion != " " &&
        $direccion != " " &&
        $tid != " " &&
        $tipo_usuario != " ") {

    include_once ('../../serverPages/ConexionDB.php');  
    $db = getDB();
    $query = "INSERT INTO usuario (usuario_id, tid, nombre, apellido, direccion, telefono, tipo_usuario,password, email, identificacion ) VALUES ('" . $usuario . "', '" . $tid . "','" . $nombre . "', '" . $apellido . "' , '" . $direccion . "', '" . $telefono . "', '" . $tipo_usuario . "', '" . $password . "' , '" . $correo . "' , '" . $identificacion . "')";
    $result = pg_query($db, $query );
    closeDB($db);    
    header('Location: ../../templates/Admin/crearUsuarioTemplateAdmin.php?creacion=si');
 
} else {
    echo "<script language='JavaScript'>
  alert('Error de Creación');</script>";
}
?>

