<?php
include_once('../../serverPages/listaAtributos.php');
include_once('../../serverPages/seguridad.php');

function obtenerAtributoAdicional($tipo) {
    include_once('../../serverPages/ConexionDB.php');
    $db = getDB();
    $adicional_id = trim($_POST['adicional_id']);
    $arraytid = explode(" ", $adicional_id);
    $primer = $arraytid{0};
    session_start();
    $_SESSION['$adicional_id'] = $primer;
    switch ($tipo) {
        case 'nombre': $query = "SELECT nombre FROM adicional WHERE adicional_id='$primer'";
            break;
        case 'descripcion': $query = "SELECT descripcion FROM adicional WHERE adicional_id='$primer'";
            break;
        case 'costo': $query = "SELECT costo FROM adicional WHERE adicional_id='$primer'";
            break;
        case 'plato': $query = "SELECT plato_id FROM adicional WHERE adicional_id='$primer'";
            break;
        default : break;
    }
    $result = pg_query($db, $query);
    $fila = pg_fetch_array($result);
    $atributo = $fila[$tipo];
    closeDB($db);
    echo $atributo;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Manejo de Extras</title>
        <!-- StyleSheet -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="../css/style.css" />
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
                                        <li><a href="admin.php">Home</a></li>
                                        <li><a href="extrasAdmin.php">Gestión Extras</a></li>                                        
                                    </ul>
                                </nav>
                            </div>
                        </header>
                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>Editar Extras</strong> 
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
                                    <div id="extra" >
                                        <!-- Boton para crear registro usuario-->  
                                        <form role="form"  action="../../controlador/Admin/editarAdicion.php" method="post"  data-ajax="false" onSubmit="return validarCampos();">                                            
                                            <br><label for="basic">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php obtenerAtributoAdicional('nombre') ?>" >
                                            <br><label for="basic">Descripción</label>
                                            <input type="text" id="descripcion" class="form-control" name="descripcion" value="<?php obtenerAtributoAdicional('descripcion') ?>" />
                                            <br><label for="basic">Plato</label>
                                            <select name="plato_id" class="form-control" >                                                                                               
                                                <option value="<?php obtenerAtributoAdicional('plato') ?>"><?php obtenerAtributoAdicional('plato') ?></option>
                                                <?php consultaPlatos() ?>
                                            </select>   
                                            <br><label for="basic">Costo</label>
                                            <input type="number"  name="costo" id="costo" class="form-control" value="<?php obtenerAtributoAdicional('costo') ?>" >

                                            <button type="submit" name="submit" class="btn btn-primary form-control" >Editar Extra</button>

                                        </form>
                                        <?php
                                        if ($_GET['creacion'] == "si") {
                                            echo '<h3><span style="color:#000000"><b>Datos Actualizados Correctamente</b></span></h3>';
                                        } else {
                                            echo $_GET['creacion'];
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
             *	 nombrePlato,codigoPlato,ingredientes, fechaCreacion  ,estado  
             */
            function validarCampos()
            {
                if (document.getElementById('nombre').value == "" ||
                        document.getElementById('descripcion').value == "" ||
                        document.getElementById('costo').value == "" ||
                        document.getElementById('plato_id').value == "")
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
