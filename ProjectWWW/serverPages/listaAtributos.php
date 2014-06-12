<?php
function consultaEmpresas() {
    include ('ConexionDB.php');
    $db = getDB();    
    $query = "SELECT tid, nombre FROM tenant ORDER BY tid DESC";
    $result1 = pg_query($db, $query);
    //$row1 = pg_fetch_all($result1)

    while ($fila = pg_fetch_array($result1)) {
        echo "<option value='" . $fila['tid'] . "' id='" . $fila['empresas'] . "'>" . $fila['tid'] . "  " . $fila['nombre'] . "</option>";
    }
    closeDB($db);
}

