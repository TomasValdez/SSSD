<?php
session_start();
  
if (isset($_POST['mail']) ){
                include ("conecct.php");
                  $con=new Connection_db();
                  $mail=trim($_POST['mail']," \t\n\r\0\x0B");
     
                              if($con->VereficarMailSolicitante($mail)){
                               header("location:../View/cards.php"); 
                              }else {
                                header('Location:' . getenv('HTTP_REFERER'));
                              }   
                     
  }
  

?>
