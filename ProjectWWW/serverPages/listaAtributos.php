<?php

function consultaEmpresas() {
    include_once('ConexionDB.php');
    $db = getDB();
    $query = "SELECT tid, nombre FROM tenant ORDER BY tid DESC";
    $result1 = pg_query($db, $query);
    //$row1 = pg_fetch_all($result1)

    while ($fila = pg_fetch_array($result1)) {
        echo "<option value=" . $fila['tid'] . " id=" . $fila['empresas'] . ">" . $fila['tid'] . "  " . $fila['nombre'] . "</option>";
    }
    closeDB($db);
}

function consultaUsuarios() {
    include_once('ConexionDB.php');
    $db = getDB();
    $query = "SELECT usuario_id FROM usuario";
    $result1 = pg_query($db, $query);
    //$row1 = pg_fetch_all($result1)
    while ($fila = pg_fetch_array($result1)) {
        echo "<option value=" . $fila['usuario_id'] . " id=" . $fila['usuarios'] . ">" . $fila['usuario_id'] . "</option>";
    }
    closeDB($db);
}

function consultaPlatos() {
    include_once('ConexionDB.php');
    $db = getDB();
    session_start();
    $tid = $_SESSION['tida'];
    $query = "SELECT plato_id,nombre FROM plato WHERE tid = '$tid'";
    $result1 = pg_query($db, $query);    
    
    //$row1 = pg_fetch_all($result1)
    while ($fila = pg_fetch_array($result1)) {
        echo "<option value=" . $fila['plato_id'] . " id=" . $fila['platos'] . ">" . $fila['plato_id'] . " " . $fila['nombre'] . "</option>";
    }
    closeDB($db);
}

function consultaExtras() {
    include_once('ConexionDB.php');
    $db = getDB();
    session_start();
    $tid = $_SESSION['tida'];
    $query = "SELECT a.adicional_id,a.nombre FROM adicional a JOIN plato p ON a.plato_id=p.plato_id WHERE tid = '$tid';";
    $result1 = pg_query($db, $query);    
    
    //$row1 = pg_fetch_all($result1)
    while ($fila = pg_fetch_array($result1)) {
        echo "<option value=" . $fila['adicional_id'] . " id=" . $fila['extras'] . ">" . $fila['adicional_id'] . " " . $fila['nombre'] . "</option>";
    }
    closeDB($db);
}
