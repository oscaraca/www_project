  <?php
  include('ConexionDB.php');
 
  if(isset($_POST['user']) && isset($_POST['pass'])){
      $usuario=$_POST['user'];
      $password=$_POST['pass'];  			
      $query = "select usuario_id from usuario where usuario_id = '$usuario' AND password ='$password'";							
      $result = pg_query($query);
      var_dump($result);
      if(pg_num_rows($result)==0){          
              sleep(1);
          header ('Location: index.php?var=true');   
      }
      else{         
        header ('Location: usuarios.html');
      }     
 }
 include ('CerrarConexionBD.php');
 ?>
