<?php
include('../../serverPages/seguridad.php');

function identificarEmpresa() {

    include_once('../../serverPages/ConexionDB.php');
    $db = getDB();
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    //print_r($arraytid);
    $primer = $arraytid{0};
    $query = "SELECT nombre, url, direccion, telefonos, logo FROM tenant WHERE tid='$primer'";

    $result = pg_query($db, $query);
    $row = pg_fetch_row($query);
    $fila = pg_fetch_array($result);

    $image = pg_unescape_bytea($row[4]);
    header("Content-type: image/jpeg");

    $nombre = $fila['nombre'];
    $url = $fila['url'];
    $direccion = $fila['direccion'];
    $telefonos = $fila['telefonos'];
    closeDB($db);

    echo "Bienvenido " . $nombre . " " . $image . " Direccion: " . $direccion . " Teléfono:" . $telefonos;
}

function obtenerAtributoEmpresa($tipo) {
    include_once('../../serverPages/ConexionDB.php');
    $db = getDB();    
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    $primer = $arraytid{0};
    session_start();
    $_SESSION['tid'] = $primer;

    switch ($tipo) {
        case 'nombre': $query = "SELECT nombre FROM tenant WHERE tid='$primer'";
            break;
        case 'direccion': $query = "SELECT direccion FROM tenant WHERE tid='$primer'";
            break;
        case 'telefonos': $query = "SELECT telefonos FROM tenant WHERE tid='$primer'";
            break;
        case 'url': $query = "SELECT url FROM tenant WHERE tid='$primer'";
            break;
        default : break;
    }
    $result = pg_query($db, $query);
    $fila = pg_fetch_array($result);
    $atributo = $fila[$tipo];
    closeDB($db);
    echo $atributo;
}

function obtenerLogoEmpresa() {
    // Connect to the database
    include_once('../../serverPages/ConexionDB.php');
    $db = getDB();
    // Get the bytea data
    $tid = trim($_POST['tid']);
    $arraytid = explode(" ", $tid);
    $primer = $arraytid{0};
    $query = "SELECT logo FROM tenant WHERE tid= '$primer'";
    $result = pg_query($db, $query);
    $row = pg_fetch_row($result);

    $image = pg_unescape_bytea($row[0]);
    header("Content-type: image/jpeg");
    //throw Exception($image);
    echo $image;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> Manejo de Empresas</title>
        <!-- StyleSheet -->

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/bootstrap.css" />
        <link rel="stylesheet" href="../../css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../../css/bootstrap-theme.css" />
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="../../css/skel-noscript.css" />
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/style-desktop.css" />
        <!--<link href="../../jquery-mobile/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"></link>
        <script src="../../jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script src="../../jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script> 
        -->
    <body class="homepage">
        <!-- Header Wrapper -->
        <div id="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="12u">
                        <!-- Header -->
                        <header id="header">
                            <div class="inner">

                                <!-- Logo -->
                                <h1><a href="#" id="logo">Restaurant Application</a></h1>

                                <!-- Nav -->
                                <nav id="nav">
                                    <ul>
                                        <li><a href="../Administrador/Administrador.php">Home</a></li> 
                                        <li><a href="../Administrador/TemplateEmpresaAdministrador.php">Gestión Empresas</a></li>                                       
                                    </ul>
                                </nav>
                            </div>
                        </header>                        

                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>Editar Empresa</strong> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="main-wrapper">
            <div class="main-wrapper-style1">
                <div class="inner">
                    <!-- Feature 1 -->
                    <section class="container box-feature1">                        
                        <!--Div para crear empresa-->
                        <div class="container login">
                            <div class="row-fluid">                
                                <div data-role="content">                    
                                    <section data-role="content">                  
                                        <div id="empresa" >
                                            <!-- Boton para crear registro empresa-->
                                            <form action="../../controlador/Administrador/editarEmpresa.php" method="post"  data-ajax="false" onSubmit="return validarCampos();" >    
                                                <br><label for="basic">Nombre</label>
                                                <input type="text" id="nombre" class="form-control" name="nombre" value="<?php obtenerAtributoEmpresa('nombre') ?>"/>                                               
                                                <br><label for="basic">URL</label> 
                                                <input type="text" id="url" class="form-control" name="url" value="<?php obtenerAtributoEmpresa('url') ?>"/>
                                                <br><label for="basic">Telefono</label>    
                                                <input type="text" id="tel" name="tel" class="form-control" value="<?php obtenerAtributoEmpresa('telefonos') ?>"/>
                                                <br><label for="basic">Dirección</label>    
                                                <input type="text"  id="direccion" name="direccion" class="form-control" value="<?php obtenerAtributoEmpresa('direccion') ?>"/>
                                                <center><br><label for="basic">Logo</label>    
                                                    <img type="file" name="logo" value="  <?php obtenerLogoEmpresa() ?>" id="logo" multiple/>
                                                </center>
                                                <br>
                                                <button type="submit" name="submit" class="btn btn-primary btn-block form-control">Editar Empresa</button>
                                            </form>
                                            <?php
                                            if ($_GET['var'] == "si") {
                                                echo '<div class="row-fluid">                
                    <center><div data-role="content">
                        <h3><span style="color:#000000"><b>Datos Actualizados Correctamente</b></span></h3>
                        
                    </div></center>
                 </div>';
                                            }
                                            ?>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>                        
                    </section>
                </div>       
            </div>
        </div>
        <script language="javascript">
             /*
             *	Funcion en javascript para validar los campos antes que se envien y los procese el PHP
            */
            function validarCampos()
                {
                        if (document.getElementById('nombre').value == "" ||
                        document.getElementById('url').value == "" ||
                        document.getElementById('direccion').value == "" ||
                        document.getElementById('tel').value == "" ||
                document.getElementById('logo').value == "")
                    {
                    alert("Debes llenar todos los campos");
                    
                return false;
                    } else {
                return true;
            }
            }
        </script>
        <!--Fin div crear empresa -->
        <!------------------------------------------------------------------->
    </body>
</html>
