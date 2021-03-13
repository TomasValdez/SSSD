<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Verificacion</title>
  </head>
  <body>

<?php
  include '../Model/conecct.php';

  if (!isset($_GET["token"]) ){
  header ("location:http://localhost:8066/Cenedit/View/registerMail.php");
  }else{

  $token =$_GET["token"];
  $con=new Connection_db();
  $sql=$con->conexion();

            $resul=$sql->query("CALL Activacion('{$token}');");
            while ($fila=mysqli_fetch_row($resul)){
           
              switch($fila[1]){
                case 1:
                  echo '<div class="alert alert-success" role="alert"> '.$fila[0].'  </div>';
            
                  break;
                case 2:
                  echo '<div class="alert alert-warning" role="alert"> '.$fila[0].'  </div>';
            
                  break;
                case 3:
                  echo '<div class="alert alert-danger" role="alert"> '.$fila[0].'  </div>';
             
                  break;

              } 
             
               
            }
 $sql->close();
 }
 
?>
</body>
</html>