<?php
include_once('../../serverPages/listaAtributos.php');
include_once('../../serverPages/seguridad.php');

function obtenerTipou() {
    session_start();
    $tipou = $_SESSION['tipou'];
    echo $tipou;
}

function obtenerUsuarioId() {
    $usuario_id = trim($_POST['usuario_id']); 
    echo $usuario_id;
}

function obtenerAtributoUsuario($tipo) {
    include_once('../../serverPages/ConexionDB.php');
    $db = getDB();   
    $usuario_id = trim($_POST['usuario_id']);    
    switch ($tipo) {
        case 'nombre': $query = "SELECT nombre FROM usuario WHERE usuario_id='$usuario_id'";
            break;
        case 'apellido': $query = "SELECT apellido FROM usuario WHERE usuario_id='$usuario_id'";
            break;
        case 'direccion': $query = "SELECT direccion FROM usuario WHERE usuario_id='$usuario_id'";
            break;
        case 'telefono': $query = "SELECT telefono FROM usuario WHERE usuario_id='$usuario_id'";
            break;
        case 'password': $query = "SELECT password FROM usuario WHERE usuario_id='$usuario_id'";
            break;
        case 'email': $query = "SELECT email FROM usuario WHERE usuario_id='$usuario_id'";
            break;
        case 'identificacion': $query = "SELECT identificacion FROM usuario WHERE usuario_id='$usuario_id'";
            break;
        case 'tid': $query = "SELECT tid FROM usuario WHERE usuario_id='$usuario_id'";
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
        <title>Manejo de Usuarios</title>
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
                                        <li><a href="../Administrador/Administrador.php">Home</a></li> 
                                        <li><a href="../Administrador/TemplateUsuariosAdministrador.php">Gestión Usuarios</a></li>                                       
                                    </ul>
                                </nav>
                            </div>
                        </header>   

                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>Editar Usuario</strong> 
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
                                    <div id="usuario" >
                                        <!-- Boton para crear registro usuario-->             
                                        <form role="form" action="../../controlador/Administrador/editarUsuarioAdministrador.php" method="post"  data-ajax="false" onSubmit="return validarCampos();" >
                                            <br><label for="basic">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?php obtenerUsuarioId() ?>"/>
                                            <br><label for="basic">Password</label>
                                            <input type="password" id="pass" name="pass" class="form-control" value="<?php obtenerAtributoUsuario('password')?>"/>
                                            <br><label for="basic">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php obtenerAtributoUsuario('nombre')?>"/>
                                            <br><label for="basic">Apellido</label>
                                            <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php obtenerAtributoUsuario('apellido')?>"/>
                                            <br><label for="basic">Identificacion</label>
                                            <input type="text" id="ide" name="ide" class="form-control" value="<?php obtenerAtributoUsuario('identificacion')?>"/>
                                            <br><label for="basic">email</label>
                                            <input type="email" id="email" name="email" class="form-control" value="<?php obtenerAtributoUsuario('email')?>" />
                                            <br><label for="basic">Teléfono</label>
                                            <input type="text" id="tel" name="tel" class="form-control" value="<?php obtenerAtributoUsuario('telefono')?>"/>
                                            <br><label for="basic">Dirección</label>
                                            <input type="text"  id="direccion" name="direccion" class="form-control" value="<?php obtenerAtributoUsuario('direccion')?>"/>
                                            <br><label for="basic">Tipo Usuario</label>
                                            <select name="tipo_usuario" class="form-control" >                                                                                               
                                                <option value="<?php obtenerTipou() ?>"><?php obtenerTipou() ?></option>
                                                <option value="administrador">administrador</option>
                                                <option value="cajero">cajero</option>
                                            </select>                              
                                            <h3><span style="color:#3366FF ">Empresa</span></h3>                                
                                            <select name="tid" class="form-control">
                                                <option value="<?php obtenerAtributoUsuario('tid') ?>"> <?php obtenerAtributoUsuario('tid') ?></option>
                                                <?php consultaEmpresas() ?>
                                            </select>                                          
                                            <button type="submit" name="submit" class="btn btn-primary btn-block form-control">Editar Usuario</button>                                       
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
                        document.getElementById('apellidos').value == "" ||
                        document.getElementById('email').value == "" ||
                        document.getElementById('direccion').value == "" ||
                        document.getElementById('tel').value == "" ||
                        document.getElementById('ide').value == "" ||
                        document.getElementById('username').value == "" ||
                        document.getElementById('pass').value == "")
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
