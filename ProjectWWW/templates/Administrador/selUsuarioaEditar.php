<?php
include_once('../../serverPages/listaAtributos.php');
include_once('../../serverPages/seguridad.php');
?>
<!DOCTYPE HTML>
<html>
    <head>        
        <title>Seleccionar Usuario a Editar</title>
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
                                        <li><a href="Administrador.php">Home</a></li> 
                                        <li><a href="TemplateUsuariosAdministrador.php">Gestión Usuario</a></li>                                       
                                    </ul>
                                </nav>
                            </div>
                        </header>   

                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>Seleccionar Usuario</strong> 
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
                                        <form action="editarUsuarioTemplateAdministrador.php" method="post"  data-ajax="false" >    
                                            <div class="form-group">
                                                <h3><span style="color:#3366FF ">Usuario</span></h3>                                
                                                <select name="usuario_id" class="form-control">
                                                    <?php consultaUsuarios() ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block form-control">Editar Usuario</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>       
            </div>
        </div>        
    </body>
</html>
