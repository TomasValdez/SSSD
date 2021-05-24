<?php
if (isset($_POST['mail']) ){
 
                include ("conecct.php");
                  $con=new Connection_db();
                  $mail=trim($_POST['mail']," \t\n\r\0\x0B");
     
                              if($con->VereficarMailSolicitante($mail)){
                                session_start();
                                $_SESSION['mail']=$_POST['mail'];
                                echo json_encode(array('success'=>true));
                              }else {
                                echo json_encode(array('success'=>false));
                            
                              }   

                              
                     
  }
  

?>
