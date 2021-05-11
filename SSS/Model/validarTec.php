<?php
  if (isset($_POST['mail']) ){
       include 'conecct.php';

     $conn=new Connection_db();

        $mail=trim($_POST['mail']," \t\n\r\0\x0B");
     
                   if  ($conn->VereficarMailTecnic($mail)){
                         
                        header("location:../View/Docente-Lab.php"); 
                   }                  
                      else{
                        header('Location:' . getenv('HTTP_REFERER'));             
                    }
                
            
  }else if (!isset($_POST['mail']) ){
    echo "no encontramos nada";
  }
?>
