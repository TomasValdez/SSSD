<?php
  if (isset($_POST['mail']) ){
       include 'conecct.php';

        $con=new Connection_db();
        $sql=$con->conexion();
        $mail=trim($_POST['mail']," \t\n\r\0\x0B");
     
             $resul=$sql->query("CALL VereficacionTec('{$mail}');");
                while ($fila=mysqli_fetch_assoc($resul)){
                 
                    
                   switch ($fila['pos']){
                      case 1:
                        session_start();
                        $_SESSION['mailT']=$mail;
                        $_SESSION['nameT']=$fila['nombre'];
                
                        header("location:../View/empleado.php"); 
                    
                      break;
                      case 0:
                    
                        header("location:../View/LoginTec.php");
                      break;                    
                    }
                }
            
         $sql->close();  
  }else if (!isset($_POST['mail']) ){
    echo "no encontramos nada";
  }

?>
