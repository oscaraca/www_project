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
    $update = "UPDATE usuario SET usuario_id='" . $usuario . "', tid='" . $tid . "' , nombre='" . $nombre . "' , apellido='" . $apellido . "', direccion='" . $direccion . "', telefono='" . $telefono . "', tipo_usuario='" . $tipo_usuario . "', password='" . $password . "', email='" . $correo . "', identificacion='" . $identificacion . "'";
    //print_r($update);
    //throw Exception($update);
    $result = pg_query($db, $update );
    closeDB($db);
    $message = "Datos actualizados correctamente";
echo "<script type='text/javascript'>alert('$message');</script>";
   header('Location: ../../templates/Admin/editarUsuarioTemplateAdmin.php?creacion=si');
  
} else {
    echo "<script language='JavaScript'>
  alert('Error de Creación');</script>";
}
?>
