<?php include('../serverPages/seguridad.php') ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Restaurant Application by HTML5 UP</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="../css/skel-noscript.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/style-desktop.css" />
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
                                        <li><a href="TemplateUsuarios.php">Gestión Usuarios</a></li>
                                        <li><a href="plato.php">Gestión Platos </a></li>
                                        <li><a href="pedidos.php">Pedidos </a></li>
                                        <li><a href="reportes.php">Reportes</a></li>
                                        <li><a href="../serverPages/cerrarSesion.php">Cerrar Sesión</a></li>
                                    </ul>
                                </nav>

                            </div>
                        </header>

                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>REPORTES</strong> 
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
                        <div class="row">
                            <div class="4u">
                                <section>
                                    <span class="image image-full"><a href=""><img src="../images/rest.png" HEIGHT=235 WIDTH=300 alt=""></a></span>
                                    <header class="second fa fa-bar-chart-o">
                                        <h3>Plato mas Vendido</h3>
                                        <span class="byline">Reporte de los platos mas vendidos</span>
                                    </header>
                                </section>
                            </div>
                            <div class="4u">
                                <section>
                                    <span class="image image-full"><a href=""><img src="../images/barchart.jpg"   HEIGHT=235 alt=""></a></span>
                                    <header class="second fa fa-bar-chart-o">
                                        <h3>Ventas</h3>
                                        <span class="byline">Variabilidad de Ventas</span>
                                    </header>
                                </section>
                            </div>
                        </div>
                </div>                
            </div>
        </div>
    </body>
</html>
