<?php
include_once('../../serverPages/listaAtributos.php');
include_once('../../serverPages/seguridad.php');

function obtenerAtributoPlato($tipo) {
    include_once('../../serverPages/ConexionDB.php');
    $db = getDB();
    session_start();
    $plato_id = trim($_POST['plato_id']);
    $arraytid = explode(" ", $plato_id);
    $primer = $arraytid{0};
    //$_SESSION['plato_id'] = $primer;

    switch ($tipo) {
        case 'nombre': $query = "SELECT nombre FROM plato WHERE plato_id='$primer'";               
            break;
        case 'ingredientes': $query = "SELECT ingredientes FROM plato WHERE plato_id='$primer'";
            break;
        case 'costo': $query = "SELECT costo FROM plato WHERE plato_id='$primer'";
            break;
        case 'estado': $query = "SELECT estado FROM plato WHERE plato_id='$primer'";
            break;
        case 'fecha': $query = "SELECT fecha FROM plato WHERE plato_id='$primer'";          
            break;       
        default : break;
    }
   
    $result = pg_query($db, $query);
    $fila = pg_fetch_array($result);
    $atributo = $fila[$tipo];
    //print_r($tipo);
    //throw Exception($tipo);
    closeDB($db);
    echo $atributo;
}
?>
<!DOCTYPE HTML>
<html>
    <head>        
        <title>Manejo de Platos</title>
        <!-- StyleSheet -->

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="../../css/bootstrap.css" />
        <link rel="stylesheet" href="../../css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../../css/bootstrap-theme.css" />
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="../../css/skel-noscript.css" />
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/style-desktop.css" />

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
                                        <li><a href="../Admin/admin.php">Home</a></li> 
                                        <li><a href="../Admin/platoAdmin.php">Gestión Platos</a></li>                                       
                                    </ul>
                                </nav>
                            </div>
                        </header>   

                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>Editar Platos</strong> 
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
                        <!--Div para crear usuario-->       
                        <div class="container login">
                            <div class="row-fluid">                    
                                <div data-role="content">                                  
                                    <div id="plato" >
                                        <!-- Boton para crear registro usuario-->             
                                        <form role="form" action="../../controlador/Admin/editarPlatoAdmin.php" method="post"  data-ajax="false" onSubmit="return validarCampos();" >                                                                                       
                                            <br><label for="basic">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php obtenerAtributoPlato("nombre") ?>"/>
                                            <br><label for="basic">Ingredientes</label>
                                            <input type="text" id="Ingredientes" name="ingredientes" class="form-control" value="<?php obtenerAtributoPlato('ingredientes') ?>"/>
                                            <br><label for="basic">Estado</label>
                                            <input type="text" id="estado" name="estado" class="form-control" value="<?php obtenerAtributoPlato('estado') ?>"/>
                                            <br><label for="basic">Fecha</label>
                                            <input type="date" id="fecha" name="fecha" class="form-control" value="<?php obtenerAtributoPlato('fecha') ?>" />
                                            <br><label for="basic">Costo</label>
                                            <input type="text" id="costo" name="costo" class="form-control" value="<?php obtenerAtributoPlato('costo') ?>"/>

                                            <button type="submit" name="submit" class="btn btn-primary btn-block form-control">Editar Plato</button>                                       
                                        </form>
                                        <?php
                                        if ($_GET['creacion'] == "si") {
                                            echo '<div class="row-fluid">                
                    <center><div data-role="content">  
                        <h3><span style="color:#000000"><b>Datos Actualizados Correctamente</b></span></h3>                      
                    </div></center>
                 </div>';
                                        }
                                        ?>
                                    </div>
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
                        document.getElementById('descripcion').value == "" ||
                        document.getElementById('costo').value == "" ||
                        document.getElementById('fecha').value == "" ||
                        document.getElementById('estado').value == "")

                {
                    alert("Debes llenar todos los campos");

                    return false;
                } else {
                    return true;
                }
            }

        </script>
        <!--Fin div crear usuario -->
        <!------------------------------------------------------------------->
    </body>
</html>
