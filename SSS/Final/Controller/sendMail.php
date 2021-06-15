<?php
include '../Model/conecct.php';
require '../Source/PHPMailer/Exception.php';
require '../Source/PHPMailer/PHPMailer.php';
require '../Source/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Instantiation and passing `true` enables exceptions

session_start();
$mailUser=$_SESSION['mail'];
$type_Ser=$_POST['solicitud'];
$otro=$_POST['otro'];

$conection=new Connection_db();
         
if ( !isset($_SESSION['status_registro']) ){ //inicializacion de staus de registro y de envio de correo
  $_SESSION['status_registro']= $conection->registration_request($type_Ser,$mailUser);
}

$mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->SMTPSecure = 'tls';
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'carlos.floresmontes11@gmail.com';                     // SMTP username
      $mail->Password   = '7341129270';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom('carlos.floresmontes11@gmail.com');
      $mail->addAddress($mailUser);     // Add a recipient   AGREGAR OTRA PERSONA PARA EN REMVIO AL ADMIN
     
    
      // Content
    //  $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Verificiacion de Servicio';
      $detaills="";
      if(!empty($_POST["otro"])){          
        $detaills=" Explicacion Detallada 
{$_POST["otro"]} 




        ";
     
      }
      
 $mail->Body    =  $detaills. "Usted. a Generado una Solicitud 
 \n Este link de Verificacion: http://localhost/Cenidet/View/Verificacion.php?mail={$mailUser} \n
                  Este link de Liberacion: http://localhost/Cenidet/View/Liberacion.php?mail={$mailUser}" ;
  
  if (isset($_SESSION['status_registro'])==true){
          if ($mail->send()==true){
              session_destroy();
              echo json_encode(array("success"=>true));
             }else {
               echo json_encode(array("success"=>false));
          }
        }
  } catch (Exception $e) {
    echo json_encode(array("success"=>false));  
  }
