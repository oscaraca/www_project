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
$tid = trim($_POST['tid']);
$arraytid = explode(" ",$tid);
print_r($arraytid);
$primer = $arraytid{0};

if ($usuario != " " &&
        $nombre != " " &&
        $apellido != " " &&
        $password != " " &&
        $correo != " " &&
        $telefono != " " &&
        $identificacion != " " &&
        $direccion != " " &&
        $primer != " " &&
        $tipo_usuario != " ") {

    include_once '../../serverPages/ConexionDB.php';  
    $db = getDB();
    $result = "INSERT INTO usuario (usuario_id, tid, nombre, apellido, direccion, telefono, tipo_usuario,password, email, identificacion ) VALUES ('" . $usuario . "', '" . $primer . "','" . $nombre . "', '" . $apellido . "' , '" . $direccion . "', '" . $telefono . "', '" . $tipo_usuario . "', '" . $password . "' , '" . $correo . "' , '" . $identificacion . "')";
    pg_query($db, $result);
    closeDB($db);    
    header('Location: ../../templates/Administrador/crearUsuarioTemplateAdministrador.php?creacion=si');
 
} else {
    echo "<script language='JavaScript'>
  alert('Error de Creación');</script>";
}
?>
