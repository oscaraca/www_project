<?php

function getDB() {
    $conn_string = "host=localhost port=5432 dbname=www user=oscaraca password=yasmin";
    $dbconn = pg_connect($conn_string) or die("Error de conexion. " . pg_last_error());
    return $dbconn;
}

function closeDB($dbconn) {
    pg_close($dbconn);
}
