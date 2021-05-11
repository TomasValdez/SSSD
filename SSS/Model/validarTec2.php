<?php
  if (isset($_POST['mail']) ){
       include 'conecct.php';

     $conn=new Connection_db();

        $mail=trim($_POST['mail']," \t\n\r\0\x0B");
     
                   if  ($conn->VereficarMailTecnic($mail)){
                    echo json_encode(array('success'=>true));
                  }else {
                    echo json_encode(array('success'=>false));
                
                  }   
                
            
  }
?>
