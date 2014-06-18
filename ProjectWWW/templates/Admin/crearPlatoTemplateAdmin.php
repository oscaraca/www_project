<?php include('../../serverPages/seguridad.php') ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Manejo de Platos</title>
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
                                        <li><a href="platoAdmin.php">Gestión PLatos</a></li>                                        
                                    </ul>
                                </nav>
                            </div>
                        </header>
                        <!-- Banner -->
                        <div id="banner">
                            <h2><strong>Crear Platos</strong> 
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
                                        <form role="form"  action="../../controlador/Admin/crearPlatoAdmin.php" method="post"  data-ajax="false" onSubmit="return validarCampos();">                                            
                                            <div class="form-group">                                
                                                <input type="text" class="form-control" id="nombrePlato" name="nombre" placeholder="Nombre del Plato">
                                            </div>                                                
                                            <div class="form-group">                                
                                                <input type="text" id="ingredientes" class="form-control" name="ingredientes"  placeholder="Ingredientes"/>
                                            </div>
                                            <div class="form-group">                                
                                                <input type="date" id="fechaCreacion" class="form-control" name="fechaCreacion"  placeholder="Fecha Creacion plato"/>
                                            </div>                                                                     
                                            <div class="form-group" >
                                                <input type="file" name="logo" id="logo" multiple/>
                                            </div>
                                            <div class="form-group"> 
                                                <select name="estado" class="form-control">
                                                    <option value="Disponible">Disponible</option>
                                                    <option value="No disponible">No Disponible</option>
                                                </select>    
                                            </div>
                                            <div class="form-group">                           
                                                <input type="number"  name="costo" id="costo" class="form-control" placeholder="Valor">
                                            </div>
                                            <div class="form-group">  
                                                <button type="submit" name="submit" class="btn btn-primary form-control" >Crear Plato</button>
                                            </div>
                                        </form>
                                        <?php
                                        if ($_GET['creacion'] == "si") {
                                            echo '<h3><span style="color:#000000"><b>Datos Creados Correctamente</b></span></h3>';
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
                if (document.getElementById('empresaPlato').value == "" ||
                        document.getElementById('nombrePlato').value == "" ||
                        document.getElementById('codigoPlato').value == "" ||
                        document.getElementById('ingredientes').value == "" ||
                        document.getElementById('fechaCreacion').value == "" ||
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





