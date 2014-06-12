<?php

$idPlato=trim($_POST['radioButton']);
$nombreAdicion = trim($_POST['nombreAdicion']);
//$fechaAdicion = date("Y-m-d");
$fotoAdicion = trim($_POST['fotoAdicion']);
$fechaAdicion= trim($_POST['fechaAdicion']);
//echo date("Y-m-d"); 
 if ($fechaAdicion == ""){
 	$fechaAdicion= date("Y-m-d");
 }

if ($idPlato != " " &&
    $nombreAdicion != " " &&   
    $fotoAdicion != " "){
    $dbconn = pg_connect("host=localhost port=5432 dbname=eat user=postgres password=cobain") or die('Could not connect: ' . pg_last_error());
	$query = "SELECT * FROM adiciones;";
    $result = pg_query($dbconn, $query) or die("Error in query: $query." . pg_last_error($connection));   
	 $id = pg_num_rows($result);
	//$algo='0';
	 echo "fecha adicion->".$fechaAdicion;
    $result = "INSERT INTO adiciones  VALUES ('" . $idPlato . "', '" . $nombreAdicion . "', '" . $id . "', '" . $fechaAdicion . "', '" . $fotoAdicion. "')";
    try {
        pg_query($dbconn, $result);
         pg_close($dbconn);
      	 header('Location: extras.php?creacion=si');
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}      

} else {
    echo "<script language='JavaScript'>
alert('Error de Creación');</script>";
}
?>
