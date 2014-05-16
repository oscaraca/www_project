<?php
$conn_string = "host=localhost port=5432 dbname=eat user=postgres password=12345";
$connect = pg_connect($conn_string) or die ("Error de conexion. ". pg_last_error());
?>