<!DOCTYPE HTML>
<html>
    <head>
       <title>Manejo de Platos</title>
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
                                            <span class="byline">Manejo de Platos :</span>
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
        <div class="container login">
            <div class="row-fluid">
                <div class="span12">  
                    <center><legend> Crear Plato </legend></center>
                </div>
                <div data-role="content">                                  
                    <div id="plato" >
                        <!-- Boton para crear registro usuario-->      
                         <form role="form"  action="crearPlato.php" method="post"  data-ajax="false" onSubmit="return validarCampos();" >
<?php
//conectar bd
    $connection = pg_connect("host=localhost port=5432 dbname=eat user=postgres password=cobain") or die('Could not connect: ' . pg_last_error());
    if (!$connection)
        { die("Could not open connection to database server");
        }

//consulta
    $query = "SELECT nombre FROM empresa;";
    $result = pg_query($connection, $query) or die("Error in query: $query." . pg_last_error($connection));
    $rows = pg_num_rows($result);
    echo "Seleccione la empresa : <br>";
//mostramos como radioButton
    if (pg_num_rows($result) == 0) 
    {
        echo "No hay empresas disponibles <br/>";
    }
    else
    {
        while ($myrow = pg_fetch_row($result)) 
            {    echo "<input type='radio' name='radioButton' value='". $myrow[0] ."'>".$myrow[0] . "<br>  " ;    }
    }


//cerramos conexion
pg_close($connection);
?>
                         <div class="form-group">      
                            <div class="form-group">                                
                                <input type="text" class="form-control" id="nombrePlato" name="nombrePlato" placeholder="nombre del Plato"><br>
                            </div>
                            <div class="form-group">                            
                                <input type="number" id="codigoPlato" class="form-control" name="codigoPlato" placeholder="codigo del Plato"/></input>
                            </div>
                            <div class="form-group">                                
                                <input type="text" id="ingredientes" class="form-control" name="ingredientesPlato"  placeholder="Ingredientes"/></input><br>
                            </div>
                            <div class="form-group">                                
                                <input type="date" id="fechaCreacion" class="form-control" name="fechaCreacionPlato"  placeholder="fecha Creacion plato"/></input><br>
                            </div>
                            <div class="form-group">                           
                                <input type="file"  name="fotoPlato" id="fotoPlato" class="form-control" placeholder="foto del Plato" multiple></input>
                            </div>
                            <div class="form-group">         
                            Estado 
                                <select name="estado">
                                   <option value="Disponible">Disponible</option>
                                   <option value="No disponible">No Disponible</option>
                                </select>    
                            </div>
                                   <!--     <div class="form-group">                                
                                        <input type="text"  id="estado" class="form-control" name="estadoPlato"   placeholder="estado"/></input><br>
                                     </div>-->
                                     
                                                                        
                        </form>
                         <button type="submit" name="submit" class="btn btn-primary span12" >Crear Plato</button>
                       <a class="btn btn-primary span4" type="button" href="pedidos.html">Atras</a>
                    
                    </div>
                </div>
            </div>
        </div>
       <?php
         if ($_GET['creacion'] == "si") {
             echo '<h3><span style="color:#CC0000"><b>Datos Creados Correctamente</b></span></h3>';
        }
         else{
            echo $_GET['creacion'];            
        }
        ?>
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





