<!DOCTYPE html>
<html> <head><title></title></head>
<body>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <?php
    
    include '../Model/conecct.php';
    require '../Source/PHPMailer/Exception.php';
    require '../Source/PHPMailer/PHPMailer.php';
    require '../Source/PHPMailer/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // Instantiation and passing `true` enables exceptions
    $type_Ser=$_POST['solicitud'];
    $mailUser=$_POST['mail'];
 
    $mail = new PHPMailer(true);

      $conection=new Connection_db();
      include '../Controller/Tokens.php';
      $token=obtenToken();

      if ($idre=$conection->registration_request($type_Ser,$mailUser,$token)){
    
      try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = '';                     // SMTP username
          $mail->Password   = '';                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      
          //Recipients
          $mail->setFrom('');
          $mail->addAddress('', '');     // Add a recipient
         
        
          // Content
        //  $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Vereficiacion de Servicio';
      
    if(isset($_POST["otro"])){
  
        $mail->Body    = "s ".$_POST["otro"];
      
    }
        $mail->Body    =   "http://localhost:8066/Cenedit/View/Vereficacion.php?token=".$token;
   
        echo '<div class="alert alert-success" role="alert">
        Registro exito, Verefique fu correo para activar la solicitud
       </div>';
    //crear el url para que podamos
        
          $mail->send();
          echo 'Message has been sent';
          echo "header(location:AlertMail.php)";
      } catch (Exception $e) {
          //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          echo '<div class="alert alert-danger" role="alert">
         Su solicitud no se pudo agregar
         </div>';
      }
    }
    else {
        
    }
    ?>

</body>
</html>