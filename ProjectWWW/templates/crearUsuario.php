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

    $dbconn = pg_connect("host=localhost port=5432 dbname=eat user=postgres password=12345") or die('Could not connect: ' . pg_last_error());
    $result = "INSERT INTO usuario (usuario_id, tid, nombre, apellido, direccion, telefono, tipo_usuario,password, email, identificacion ) VALUES ('" . $usuario . "', '" . $primer . "','" . $nombre . "', '" . $apellido . "' , '" . $direccion . "', '" . $telefono . "', '" . $tipo_usuario . "', '" . $password . "' , '" . $correo . "' , '" . $identificacion . "')";
    pg_query($dbconn, $result);
    pg_close($dbconn);

    header('Location: usuario.php?creacion=si');
 
} else {
    echo "<script language='JavaScript'>
  alert('Error de Creación');</script>";
}
?>
