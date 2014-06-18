<?php

include('../serverPages/ConexionDB.php');

function returnUser() {
    $usuario = $_POST['user'];
    $password = $_POST['pass'];
}

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $usuario = $_POST['user'];
    $password = $_POST['pass'];

    $query = "select password,tipo_usuario from usuario where usuario_id = '$usuario'";
    $result = pg_query(getDB(), $query);
    $row = pg_fetch_array($result);
    $var = $row['password'];
    $tipo = $row['tipo_usuario'];
    if ($password != $var || (pg_num_rows($result) == 0)) {
        header('Location: ../templates/index.php?var=true');
    } else {
        session_start();
        $_SESSION['autentificado'] = 'SI';
        switch ($tipo) {
            case 'Administrador': header('Location: ../templates/Administrador/Administrador.php');
                $_SESSION['tipou'] = $tipo;
                break;
            case 'administrador': header('Location: ../templates/Admin/admin.php');
                $query2 = "select tid from usuario where usuario_id = '$usuario'";
                $result2 = pg_query(getDB(), $query2);
                $row2 = pg_fetch_array($result2);
                $var2 = $row2['tid'];
                $_SESSION['tida'] = $var2;
                $_SESSION['usuarioAdmin'] = $usuario;
                break;
            case 'cajero': header('Location: .html');
                break;
            default : header('Location: ../templates/index.php');
                break;
        }
    }
    closeDB(getDB());
}
?>
