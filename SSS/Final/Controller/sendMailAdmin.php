

    <?php
    
    require '../Source/PHPMailer/Exception.php';
    require '../Source/PHPMailer/PHPMailer.php';
    require '../Source/PHPMailer/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // Instantiation and passing `true` enables exceptions

    class classSendMail{


      function mailAdmin($opc,$NombbreSolicitante,$tecnico,$solicitud){
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
          $mail->setFrom('carlos.floresmontes11@gmail.com',"Sistema De Solcitud/Asignacion");
          //$mail->addAddress("alberto_uzumaki@live.com");     // Add a recipient   AGREGAR OTRA PERSONA PARA EN REMVIO AL ADMIN
          $mail->addAddress("cf198252@gmail.com");

          $mail->Subject = 'Verificiacion de Servicio';
          if ($opc==0){
            $mail->Body    = "Sea Realizado  la Verificacion de una solicitud  del tipo: {$solicitud}  con el nombre {$NombbreSolicitante} el dia de ".date("F j, Y, g:i a").
            " y el servicio estara en Espera de un tecnico"; 
           
          }
       else 
        if ($opc==1){
          $mail->Body    = "Sea Realizado  la Verificacion de una solicitud  de tipo: {$solicitud} con el nombre  {$NombbreSolicitante} el dia de ".date("F j, Y, g:i a").
        " El tecnico que lo atendera sera: {$tecnico}"; 
          }
         if ( $mail->send()==TRUE){
        return true;
             }
             else {

      return false;
             }
      } catch (Exception $e) {
       
      return false;  
      }
      return false;
    }
  
  }