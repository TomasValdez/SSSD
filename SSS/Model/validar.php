<?php
  if (isset($_POST['mail']) ){
       include 'conecct.php';

        $con=new Connection_db();
        $sql=$con->conexion();
        $mail=$_POST['mail'];
     
             $resul=$sql->query("CALL Veref('{$mail}');");
                while ($fila=mysqli_fetch_assoc($resul)){
                  echo $fila['v'];
                    
                   switch ($fila['v']){
                      case "Si":
                        session_start();
                        $_SESSION['mail']=$mail;
                
                        header("location:../View/cards2.php"); 
                    
                      break;
                      case "No":
                        header("location:localhost:8066/Cenedit/SSS/View/index.php)");
                    
                      break;                    
                    }
                }
            
         $sql->close();  
  }else{
    echo "no encontramos nada";
  }

?>
