

    <?php
    
    include '../Model/conecct.php';
    //require 'Ticked.php';
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

    if(isset($mailUser)){
    
    
      $mail = new PHPMailer(true);
      $conection=new Connection_db();
    //  $pdf=new PDF();
      
      if ($conection->registration_request($type_Ser,$mailUser)==TRUE){
    
      try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->SMTPSecure = 'tls';
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'carlos.floresmontes11@gmail.com';                     // SMTP username
          $mail->Password   = 'c0cac0la';                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      
          //Recipients
          $mail->setFrom('carlos.floresmontes11@gmail.com');
          $mail->addAddress($mailUser);     // Add a recipient   AGREGAR OTRA PERSONA PARA EN REMVIO AL ADMIN
         
        
          // Content
        //  $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Vereficiacion de Servicio';
          
          if(isset($_POST["otro"])){          
            $mail->Body    = "\n\n Explicacion Detallada \n".$_POST["otro"];
            
          }
          
                    $mail->Body    =   " Usted. Esta solicitando  el servicio en ".$type_Ser.
                    " http://localhost:8066/Cenidet/View/Verificacion.php?mail={$mailUser} \n
                    http://localhost:8066/Cenidet/View/Liberacion.php?mail={$mailUser}" ;
               


       
             // $mail->AddStringAttachment($pdf->Output("","S"), 'doc.pdf');

         if ( $mail->send()==TRUE){
           session_reset();
           session_destroy();
          echo json_encode(array("success"=>true));

             }
      } catch (Exception $e) {
         
      }

      echo json_encode(array("success"=>false));
    }
    
  }
    ?>

</body>
</html>