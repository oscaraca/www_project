<?php

include('ConexionDB.php');

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $usuario = $_POST['user'];
    $password = $_POST['pass'];

    $query = "select password,tipo_usuario from usuario where usuario_id = '$usuario'";
    $result = pg_query($query);
    $row = pg_fetch_array($result);
    $var = $row['password'];
    $tipo = $row['tipo_usuario'];
    if ($password != $var || (pg_num_rows($result) == 0)) {
        header('Location: index.php?var=true');
    } else {
        session_start();
        $_SESSION['autentificado']='SI';        
        switch ($tipo) {
            case 'Administrador': header('Location: Administrador.php');
                break;
            case 'administrador': header('Location: TemplateUsuarios.php');
                break;
            case 'admin': header('Location: .html');
                break;
            default : header('Location: index.php');
                break;
        }        
    }
    include ('CerrarConexionBD.php');
}
?>
