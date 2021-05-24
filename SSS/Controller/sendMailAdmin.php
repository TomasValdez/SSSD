

    <?php
    
    require '../Source/PHPMailer/Exception.php';
    require '../Source/PHPMailer/PHPMailer.php';
    require '../Source/PHPMailer/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // Instantiation and passing `true` enables exceptions

    function mailAdmin($Tecn,$mails){
    $mail = new PHPMailer(true);
    
    
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
          $mail->setFrom('carlos.floresmontes11@gmail.com',"Sistema De Solcitud/Asignacion");
          $mail->addAddress("carlos.floresmontes11@gmail.com");     // Add a recipient   AGREGAR OTRA PERSONA PARA EN REMVIO AL ADMIN
         
        
          $mail->Subject = 'Vereficiacion/agragacion de Servicio';
          
       
          
                    $mail->Body    = " EL SR(A) {$Tecn} es quien atendera sulicitud del Correo {$mails}" ;
              
         if ( $mail->send()==TRUE){
        return true;
             }
      } catch (Exception $e) {
         
      }
      return true;
    }