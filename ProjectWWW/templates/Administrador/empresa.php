<?php include('../../serverPages/seguridad.php') ?>
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
                            <h2><strong>Crear Empresa</strong> 
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
                                            <form action="../../controlador/Administrador/crearEmpresa.php" method="post"  data-ajax="false" onSubmit="return validarCampos();" >    
                                                <div class="form-group"> 
                                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"/>
                                                </div>
                                                <div class="form-group" >
                                                    <input type="file" name="logo" id="logo" multiple></input>
                                                </div>
                                                <div class="form-group"> 
                                                    <input type="url" id="url" class="form-control" name="url" placeholder="URL"/>
                                                </div>
                                                <div class="form-group"> 
                                                    <input type="tel" id="tel" name="tel" class="form-control" placeholder="Telefono"></input>
                                                </div>
                                                <div class="form-group"> 
                                                    <input type="text"  id="direccion" name="direccion" class="form-control" placeholder="Direccion"/>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-primary btn-block span12">Crear Empresa</button>
                                            </form>                                          
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_GET['var'] == "si") {
                            echo '<div class="row-fluid">                
                    <center><div data-role="content">
                    <a class="btn btn-primary span12" type="button" href="../Administrador/crearUsuarioTemplateAdministrador.php">Crear Usuarios</a>
                        <h3><span style="color:#000000"><b>Datos Creados Correctamente</b></span></h3>
                        
                    </div></center>
                 </div>';
                        }
                        ?>
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