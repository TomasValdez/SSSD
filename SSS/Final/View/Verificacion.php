<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Source/css/normalize.css">
    <link rel="stylesheet" href="../Source/css/index.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    
    
    <title>Verificacion</title>
  </head>
  <body>

 
  
<?php 
    
  include "../Controller/sendMailAdmin.php";
   include '../Model/conecct.php';
   include "../include/banner_tenc.php";
   
  if (!isset($_GET["mail"]) ){
  header ("Location: index.php");
  }else{ 

    echo '<div class="content-position"> <div id="content-status_liberacion" class="content-liberacion">
    <div class="image-status"> ';


  $mail =trim($_GET["mail"]," \t\n\r\0\x0B");

  $con=new Connection_db();

  $sql=$con->conexion();

            $ex=$sql->prepare("CALL Act_Registro('{$mail}')");


              if ($ex->execute()){

                $result=$ex->fetchAll();
                $mails=new classSendMail();
                
                foreach($result as $key=>$fila){
                  switch($fila['Asignacion']){
                    case 0:
                        if ($mails->mailAdmin(0,$fila['NombreS'],"","")){
                       echo  '<img  id="img-status" src="../Source/img/status-ok.png" >       
                        </div>
                        <div class="div-text-status"><span id="menssage-status">
                        POR EL MOMENTO TODOS NUESTROS TECNICOS ESTAN OCUPADOS </span></div>';
                   } 
                      
                      break;
                      case 1:
                     
                    if ($mails->mailAdmin(1,$fila['NombreS'],$fila['Nombre'],$fila['tipo'])){
                      echo  '<img  id="img-status" src="../Source/img/status-ok.png" >       
                      </div>
                      <div class="div-text-status"> <span id="menssage-status" >Quien atendera solitud sera: '.$fila['Nombre'].'</span></div>';
                        
                       
                    }
                      break;
                      case 2:
                        echo  '<img  id="img-status" src="../Source/img/precaucion.png" >       
                        </div>
                        <div class="div-text-status"> <span id="menssage-status" >Solicitud Ya Activada</span></div>';
                        
                         break;
                         case 3:
                     
                          echo '<div class="alert alert-danger" role="alert"> CORREO ERRONEO  </div>';
                
                        
                           break;
                  }
                   
               
              }
              }else{
                echo  '<img  id="img-status src="../Source/img/mail-error.webp" >       
                </div>
                <div class="div-text-status">
<span id="menssage-status" >No Activado </span></div>';
        
              }
              echo "<div><a href='index.php'>inicio</a></div></div>";

 }
 ?>
</body>
</html>