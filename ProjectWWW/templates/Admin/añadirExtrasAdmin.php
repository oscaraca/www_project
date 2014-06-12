<?php include('../../serverPages/seguridad.php') ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Manejo de Extras</title>
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
                                        <li><a href="admin.php">Home</a></li>                                                             
                                        <li><a href="../../serverPages/cerrarSesion.php">Cerrar Sesión</a></li>  
                                    </ul>
                                </nav>
                            </div>
                        </header>

                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>Extras</strong> 
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
                        <div class="row-fluid">
                            <div class="span12">  
                                <center><legend> Crear Extras </legend></center>
                            </div>
                            <div data-role="content">                                  
                                <div id="plato" >
                                    <!-- Boton para crear registro usuario-->      
                                    <form role="form"  action="../../controlador/Admin/crearAdicion.php" method="post"  data-ajax="false" onSubmit="return validarCampos();" >      
                                        <div class="form-group">                                
                                            <input type="text" class="form-control" id="nombreAdicion" name="nombreAdicion" placeholder="nombre de la adicion"><br>
                                        </div>
                                        <div class="form-group">                           
                                            <input type="file"  name="fotoAdicion" id="fotoAdicion" class="form-control" placeholder="foto de la Adicion" multiple></input>
                                        </div>
                                        <div class="form-group">   
                                            <input type="date" class="form-control" id="fechaAdicion" name="fechaAdicion" placeholder="Fecha de la Adicion">Por defecto dia de Hoy<br>
                                        </div>  
                                    </form>
                                    <div class="form-group"> 
                                        <button type="submit" name="submit" class="btn btn-primary span12" >Crear Extra en el Plato</button>
                                        <a class="btn btn-primary span4" type="button" href="pedidos.html">Atras</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($_GET['creacion'] == "si") {
                            echo '<h3><span style="color:#CC0000"><b>Datos Creados Correctamente</b></span></h3>';
                        } else {
                            echo $_GET['creacion'];
                        }
                        ?>
                    </section>
                </div>       
            </div>
        </div>
        <script language="javascript">
            /*
             *	Funcion en javascript para validar los campos antes que se envien y los procese el PHP
             *	 nombrePlato,codigoPlato,ingredientes, fechaCreacion  ,estado  
             */
            function ponerFecha() {
                document.getElementById('fechaAdicion').value = new Date().toDateInputValue();
            }
            function validarCampos()
            {
                if (document.getElementById('nombreAdicion').value == "" ||
                        document.getElementById('fotoAdicion').value == "")
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





