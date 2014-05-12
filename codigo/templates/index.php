<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Sistema de Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <!-- StyleSheet -->
              <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../css/bootstrap-theme.css" />
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="../css/CSS.css" />
    </head> 
    <body>
        <!-- Main Container -->
        <center>
            <section>          
                <div class="container login">
                    <div data-role="content">
                        <center> <img src="../images/rest.png" width="200" height="200"></img></center>    
                    </div>
                    <div class="row-fluid">
                        <div class="span12">   
                            <legend>Please Sign In</legend>
                            <form action="login.php" method="post">  
                                <input type="text" id="username" class="span4" name="user" placeholder="Username" />
                                <input type="password" id="password" class="span4" name="pass" placeholder="Password" />            
                                <button type="submit" name="submit"  class="btn btn-primary btn-block span4">Sign in</button>
                            </form> 
                        </div>
                    </div>                
                </div>

                <?php
                if ($_GET['var'] == true) {
                    /* Imrimir mensaje de error login */
                    echo '<div class="alert alert-error">
                <a class="close" data-dismiss="alert" data-ajax="true" href="#">×</a>Incorrect Username or Password!
            </div>';
                }
                ?>

                <p class="text ">&copy; Copyright 2014 - Login</p>
            </section></center>

        <!-- JavaScript -->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery-1.6.4.min.js"></script>
    </body>
</html>