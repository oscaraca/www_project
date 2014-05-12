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

/*if ($usuario != " " &&
        $nombre != " " &&
        $apellido != " " &&
        $password != " " &&
        $correo != " " &&
        $telefono != " " &&
        $identificacion != " " &&
        $direccion != " ") {*/

    $dbconn = pg_connect("host=localhost port=5432 dbname=eat user=postgres password=cobain") or die('Could not connect: ' . pg_last_error());
    $result = "INSERT INTO usuario (usuario_id, tid, nombre, apellido, direccion, telefono, tipo_usuario, email,password ) VALUES ('" . $usuario . "', '0','" . $nombre . "', '" . $apellido . "' , '" . $direccion . "', '" . $telefono . "', '" . $tipo_usuario . "', '" . $correo . "', '" . $password . "');";
    pg_query($dbconn, $result);
    pg_close($dbconn);

    header('Location: usuario.php?creacion=si');
 
/*} else {
    echo "<script language='JavaScript'>
  alert('Error de Creación');</script>";
}*/
?>
