
    <?php
    require '../Source/PHPMailer/Exception.php';
    require '../Source/PHPMailer/PHPMailer.php';
    require '../Source/PHPMailer/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    function sendMail($mailuser):bool{

      session_start();
      $tec=$_SESSION['mailt'];
       $mail = new PHPMailer(true);
       
       try {
           //Server settingss $mail->SMTPDebug = SMTP::DEBUG_OFF;  
                          // Enable verbose debug output
           $mail->isSMTP();                                            // Send using SMTP
           $mail->SMTPSecure = 'tls';
           $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
           $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
           $mail->Username   = 'carlos.floresmontes11@gmail.com';                     // SMTP username
           $mail->Password   = 'c0cac0la';                               // SMTP password
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
           $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
       
           //Recipients
           $mail->setFrom('carlos.floresmontes11@gmail.com',"tecnico/Cenidet");
           $mail->addAddress($mailuser, 'Tecnico/CENIDET'); //persona dde quien la solicito
         //  $mail->addAddress("carlos.floresmontes11@gmail.com", 'Tecnico/CENIDET');      // Add a recipient
          
         
           // Content
         //  $mail->isHTML(true);                                  // Set email format to HTML
           $mail->Subject = 'Liberacion de Servicio/CENIDET';
       
             
 
         $mail->Body    =   "SE LE COMOMUNICA, QUE EL TECNICO ".$tec." SE LE DECEA SER LIBERADO POR COMPLIR SU SOLCITUD";
    
         
         if ($mail->send(false)==TRUE){
           return true;
          }
      else{    
          return false;
      }
        } catch (Exception $e) {
          return false;
        
        }
        
      
  }