<!DOCTYPE HTML>
<html>
    <head>
       <title>Manejo de Usuarios</title>
        <!-- StyleSheet -->
   
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../css/bootstrap-theme.css" />
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="../css/CSS.css" />
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
                                            <nav id="nav">
                                                <ul>
                                                    <li class="current_page_item"><a href="index.html">Home</a></li>
                                                    <li><a href="usuarios.html">Usuarios</a></li>
                                                    <li><a href="left-sidebar.html">Pedidos</a></li>
                                                    <li><a href="right-sidebar.html">Reportes</a></li>
                                                
                                                </ul>
                                            </nav>
                                    
                                    </div>
                                </header>

                            <!-- Banner -->
                                <div id="banner">
                                    <h2><strong>Restaurant Application:</strong> 
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
                                            <span class="byline">Manejo de Usuarios :</span>
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
      
        <!--Div para crear usuario-->
    <div id="main">
        <div class="container login">
            <div class="row-fluid">
                <div class="span12">  
                    <center><legend> Crear Usuario </legend></center>
                </div>
                <div data-role="content">                                  
                    <div id="usuario" >
                        <!-- Boton para crear registro usuario-->             
                        <form role="form" action="crearUsuario.php" method="post"  data-ajax="false" onSubmit="return validarCampos();" >
                            <div class="form-group">                                
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username"></input>
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
                                <input type="email" id="email" name="email" class="form-control" placeholder="Correo Electronico"></input>
                            </div>
                            <div class="form-group">                                
                                <input type="text" id="tel" name="tel" class="form-control" placeholder="Telefono"></input>
                            </div>
                            <div class="form-group">                                
                                <input type="text"  id="direccion" name="direccion" class="form-control" placeholder="Direccion"/>
                            </div>
                            <div class="form-group">                                
                                <select name="tipo_usuario">
                                   <option value="cajero">cajero</option>
                                   <option value="administrador">administrador</option>
                                </select>                                </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block span12">Crear Usuario</button>
                        </form>
                        <a class="btn btn-primary span4" type="button" href="usuarios.html">Atras</a>
                    
                </div>
            </div>
        </div>
</div>
        <?php
        if ($_GET['creacion'] == "si") {
            echo '<h3><span style="color:ffffff"><b>Datos Creados Correctamente</b></span></h3>
                                ';
        }
        ?>
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
