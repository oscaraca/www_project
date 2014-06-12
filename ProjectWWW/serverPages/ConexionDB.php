<?php

function getDB() {
    $conn_string = "host=localhost port=5432 dbname=eat user=postgres password=12345";
    $dbconn = pg_connect($conn_string) or die("Error de conexion. " . pg_last_error());
    return $dbconn;
}

function closeDB($dbconn) {
    pg_close($dbconn);
}
