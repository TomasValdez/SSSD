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

  if (!isset($_GET["mail"]) ){
  header ("location:http://localhost:8066/Cenedit/View/registerMail.php");
  }else{

  $mail =$_GET["mail"];
  $con=new Connection_db();
  $sql=$con->conexion();

            $ex=$sql->prepare("CALL Activacion('{$mail}')");
              if ($ex->execute()){
                echo '<div class="alert alert-success" role="alert"> Activado  </div>';
              }else{
                echo '<div class="alert alert-success" role="alert"> No Activado  </div>  ';
              }

 }
 
?>
</body>
</html>