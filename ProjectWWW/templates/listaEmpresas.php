<?php
function consultaEmpresas() {
    $dbconn = pg_connect("host=localhost port=5432 dbname=eat user=postgres password=12345") or die('Could not connect: ' . pg_last_error());
    $query = "SELECT tid, nombre FROM tenant ORDER BY tid DESC";
    $result1 = pg_query($dbconn,$query);
    //$row1 = pg_fetch_all($result1)

    while ($fila = pg_fetch_array($result1)) {
        echo "<option value='" . $fila['tid'] . "'id='" . $fila['empresas'] . "'>".$fila['tid']."  " . $fila['nombre'] . "</option>";
    }
    pg_close($dbconn);
}
?>