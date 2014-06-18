<?php
error_reporting(0);

//Decodificamos los datos
$se = json_decode(stripslashes($_POST["key"]));
//Mostramos los datos
//echo $se->codigoPedido."modif\n";
$codigo_pedido = $se->codigoPedido;

include('../serverPages/ConexionDB.php');
$query = "SELECT estado FROM pedido WHERE consecutivo=$se->codigoPedido";
$result = pg_query(getDB(), $query);
$row = pg_fetch_array($result);
$var = $row['estado'];
if (pg_num_rows($result) == 0) {
    echo "noexiste";
} else {
    echo $var;
}
?>