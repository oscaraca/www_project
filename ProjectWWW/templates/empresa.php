<?php include('seguridad.php')?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> Manejo de Empresas</title>
        <!-- StyleSheet -->

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../css/bootstrap-theme.css" />
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="../css/skel-noscript.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/style-desktop.css" />

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
                        <div class="row">
                            <div class="12u">
                                <header class="first major">
                                    <h2>Administrador</h2>
                                    <span class="byline">Manejo de Empresas :</span>
                                    <select>
                                        <option value="crear">Crear</option>
                                        <option value="modificar">Modificar</option>
                                        <option value="borrar">Borrar</option>
                                    </select>
                                </header>
                            </div>
                        </div>
                    </section>
                </div>       
            </div>
        </div>
        <!--Div para crear empresa-->
        <div class="container login">
            <div class="row-fluid">                
                <div data-role="content">                    
                    <section data-role="content">                  
                        <div id="empresa" >
                            <!-- Boton para crear registro empresa-->
                            <form action="crearEmpresa.php" method="post"  data-ajax="false" onSubmit="return validarCampos();" >    
                                <div class="form-group"> 
                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"/>
                                </div>
                                <div class="form-group">                        
                                    <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo" multiple></input>
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
                            <a class="btn btn-primary span12" type="button" href="Administrador.php">Home</a>

                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php
        if ($_GET['creacion'] == "si") {
            echo '<div class="row-fluid">                
                    <center><div data-role="content">  
                        <h3><span style="color:#FFFFFF"><b>Datos Creados Correctamente</b></span></h3>
                        <a class="btn btn-primary span12" type="button" href="usuario.php">Crear Usuarios</a>
                    </div></center>
                 </div>';
        }
        ?>
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