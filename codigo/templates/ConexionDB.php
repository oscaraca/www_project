<?php
$conn_string = "host=localhost port=5432 dbname=eat user=postgres password=cobain";
$connect = pg_connect($conn_string) or die ("Error de conexion. ". pg_last_error());
?>