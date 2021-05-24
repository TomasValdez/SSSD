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
    include "../Controller/sendMailAdmin.php";
   include '../Model/conecct.php';

  if (!isset($_GET["mail"]) ){
  header ("location:http://localhost:8066/Cenedit/View/registerMail.php");
  }else{

  $mail =$_GET["mail"];
  $con=new Connection_db();
  $sql=$con->conexion();

            $ex=$sql->prepare("CALL Activacion('{$mail}')");


              if ($ex->execute()){

                $result=$ex->fetchAll();
                echo '<div class="alert alert-success" role="alert"> Activado  </div>';
                //echo "------ ------ {". ."-----------------------";
                
                foreach($result as $key=>$fila){
                  switch($fila['Asignacion']){
                    case 0:
                      
                      echo "------ ------ POR EL MOMENTO NO TODOS NUESTRO TECNICOS ESTAN OCUPADOS -----------------------";
                  
                      break;
                      case 1:
                       // echo "------ ------ EL SR(A) {$fila['0']} es quien atendera sulicitud-----------------------";
                        // aqui ira el envio de mail
                        if (mailAdmin($fila['0'],$mail)){
                          echo "Agregacion Correcta";
                       
                        }
                        break;
                  }
                   
               
              }
              }else{
                echo '<div class="alert alert-success" role="alert"> No Activado  </div>  ';
              }

 }
 
?>
</body>
</html>