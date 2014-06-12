<?php include('../../serverPages/seguridad.php') ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Restaurant Application</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="../../css/skel-noscript.css" />
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/style-desktop.css" />
    </head>
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
                                        <li><a href="../../serverPages/cerrarSesion.php">Cerrar Sesión</a></li>                                        
                                    </ul>
                                </nav>
                            </div>
                        </header>
                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>Administrador</strong> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Wrapper -->
        <div id="main-wrapper">
            <div class="main-wrapper-style1">
                <div class="inner">

                    <!-- Feature 1 -->
                    <section class="container box-feature1">                        
                        <div class="row">
                            <div class="12u">
                                <header class="first major">
                                    <h2>Administrador</h2>
                                    <span class="byline">Bienvenido, selecciona lo que quieres hacer</span>
                                </header>
                            </div>
                        </div>
                        <center>
                            <div class="row">
                                <div class="4u offset2">
                                    <section>
                                        <span class="image image-full"><a href="../Administrador/TemplateEmpresaAdministrador.php"><img src="../../images/pic02.jpg" HEIGHT=235 WIDTH=300 alt=""></a></span>
                                        <header class="second fa fa-bar-chart-o">
                                            <h3>Empresa</h3>
                                            <span class="byline">Manejo de Empresas</span>
                                        </header>
                                    </section>
                                </div>
                                <div class="4u offset2" >
                                    <section>
                                        <span class="image image-full"> <a href="../Administrador/TemplateUsuariosAdministrador.php"><img src="../../images/pic01.jpg" HEIGHT=235 WIDTH=300 alt=""></a></span>
                                        <header class="second fa fa-bar-chart-o">
                                            <h3>Usuarios</h3>
                                            <span class="byline">Manejo de Usuarios</span>
                                        </header>
                                    </section>
                                </div>
                            </div>
                        </center>
                    </section>                    
                </div>
            </div>
        </div>
    </body>
</html>