<?php
include_once('../../serverPages/listaAtributos.php');
include_once('../../serverPages/seguridad.php');
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
                            <h2><strong>Crear Usuario</strong> 
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
                                        <form role="form" action="../../controlador/Administrador/crearUsuarioAdministrador.php" method="post"  data-ajax="false" onSubmit="return validarCampos();" >
                                            <div class="form-group">                                
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Username"/>
                                            </div>
                                            <div class="form-group">                                
                                                <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña"/>
                                            </div>                    
                                            <div class="form-group">                               
                                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"/>
                                            </div>
                                            <div class="form-group">                                  
                                                <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos"/>
                                            </div>
                                            <div class="form-group">                                
                                                <input type="text" id="ide" name="ide" class="form-control" placeholder="Numero de Id"/>
                                            </div>
                                            <div class="form-group">                                
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Correo Electronico"/>
                                            </div>
                                            <div class="form-group">                                
                                                <input type="text" id="tel" name="tel" class="form-control" placeholder="Telefono"/>
                                            </div>
                                            <div class="form-group">                                
                                                <input type="text"  id="direccion" name="direccion" class="form-control" placeholder="Direccion"/>
                                            </div>
                                            <div class="form-group">                                
                                                <select name="tipo_usuario" class="form-control" >
                                                    <option value="administrador">administrador</option>
                                                    <option value="cajero">cajero</option>
                                                </select>                                
                                            </div>
                                            <div class="form-group">
                                                <h3><span style="color:#3366FF ">Empresa</span></h3>                                
                                                <select name="tid" class="form-control">
                                                    <?php consultaEmpresas() ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-primary btn-block span12">Crear Usuario</button>
                                            </div>
                                        </form>
                                        <?php
                                        if ($_GET['creacion'] == "si") {
                                            echo '<div class="row-fluid">                
                    <center><div data-role="content">  
                        <h3><span style="color:#000000"><b>Datos Creados Correctamente</b></span></h3>                      
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
