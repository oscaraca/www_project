<?php

function identificarEmpresa() {

    include('../serverPages/ConexionDB.php');
    $db = getDB();
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    print_r($arraytid);
    $primer = $arraytid{0};
    $query = "SELECT nombre, url, direccion, telefonos, logo FROM tenant WHERE tid=$primer";

    $result = pg_query($db, $query);
    $row = pg_fetch_row($query);
    $fila = pg_fetch_array($result);

    $image = pg_unescape_bytea($row[4]);
    header("Content-type: image/jpeg");

    $nombre = $fila[nombre];
    $url = $fila[url];
    $direccion = $fila[direccion];
    $telefonos = $fila[telefonos];
    closeDB($db);

    echo "Bienvenido " . $nombre . " " . $image . " Direccion: " . $direccion . " Teléfono:" . $telefonos;
}

function obtenerNombreEmpresa() {
    include('../serverPages/ConexionDB.php');
    $db = getDB();
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    print_r($arraytid);
    $primer = $arraytid{0};
    $query = "SELECT nombre FROM tenant WHERE tid=$primer";

    $result = pg_query($db, $query);
    $fila = pg_fetch_array($result);
    $nombre = $fila[nombre];
    closeDB($db);
    echo $nombre;
}

function obtenerURLEmpresa() {
    include('../serverPages/ConexionDB.php');
    $db = getDB();
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    print_r($arraytid);
    $primer = $arraytid{0};
    $query = "SELECT url FROM tenant WHERE tid=$primer";

    $result = pg_query($db, $query);
    $fila = pg_fetch_array($result);
    $url = $fila[url];
    closeDB($db);
    echo $url;
}

function obtenerDireccionEmpresa() {
    include('../serverPages/ConexionDB.php');
    $db = getDB();
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    print_r($arraytid);
    $primer = $arraytid{0};
    $query = "SELECT direccion FROM tenant WHERE tid=$primer";

    $result = pg_query($db, $query);
    $fila = pg_fetch_array($result);
    $direccion = $fila[direccion];
    closeDB($db);
    echo $direccion;
}

function obtenerTelefonosEmpresa() {
    include('../serverPages/ConexionDB.php');
    $db = getDB();
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    print_r($arraytid);
    $primer = $arraytid{0};
    $query = "SELECT telefonos FROM tenant WHERE tid=$primer";

    $result = pg_query($db, $query);
    $fila = pg_fetch_array($result);
    $telefonos = $fila[telefonos];
    closeDB($db);
    echo $telefonos;
}

function obtenerLogoEmpresa() {
    include('../serverPages/ConexionDB.php');
    $db = getDB();
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    print_r($arraytid);
    $primer = $arraytid{0};
    $query = "SELECT url FROM tenant WHERE tid=$primer";

    $result = pg_query($db, $query);
    $fila = pg_fetch_array($result);
    $url = $fila[url];
    closeDB($db);
    echo $url;

    // Connect to the database
    include('../serverPages/ConexionDB.php');
    $db = getDB();
    // Get the bytea data
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    print_r($arraytid);
    $primer = $arraytid{0};
    $query = "SELECT logo FROM tenant WHERE tid=$primer";

    $result = pg_query($db, $query);
    $raw = pg_fetch_result($result, 'logo');

    // Convert to binary and send to the browser
    header('Content-type: image/jpeg');
    echo pg_unescape_bytea($raw);
}
