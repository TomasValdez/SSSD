<?php

use FFI\Exception;
class Connection_db{

function conexion(){
    try {
          $conn = new PDO("mysql:host=localhost;dbname=solicitud", "root", "c0cac0la");
          
          //$conn = new PDO("mysql:host=sql101.epizy.com;dbname=epiz_28508197_Solicitud", "epiz_28508197", "27uiRpt9dmu");
          
            // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
              return $conn ;
                    } catch(PDOException $e) {
                      echo "Connection failed: " . $e->getMessage();
                    }
              return $conn ;
}
// funciones para el solitate 
#1 verificar si el correo del estudiante o empleado esta en la base de datos
function VereficarMailSolicitante($mail):bool{
  $conexion =$this->conexion();
  $smtp=$conexion->prepare("SELECT Correo from empleado WHERE Correo='".$mail."' 
  UNION SELECT Correo from estudiante WHERE Correo='".$mail."'" );
  $smtp->execute();
  $result=$smtp->fetchall();

  if($result!=null){
    $_SESSION['mail']=$mail;
    if (isset($_SESSION['error'])){//si existe la session de error
      session_reset();
      session_destroy();
    }
      return true;
    }else {

    if (!isset( $_SESSION['error'])){//si existe la session de error
      $_SESSION['error']="Error... usuario no encontrado";
      }
    }
    $smtp=null;                  
    $conexion=null;
    return false;

}

#2 verificar si el correo del Tecnico esta en la base de datos
function VereficarMailTecnic($mail):bool{
  $conexion =$this->conexion();
  //$smtp=$conexion->prepare("CALL VereficacionTec('{$mail}');");
  $smtp=$conexion->prepare("SELECT concat(Nombre,' ',ApellidoP,' ',ApellidoM) AS nombre from tecnico 
  WHERE Correo='{$mail}'");
  
  $smtp->execute();
  
  $result=$smtp->fetchall(PDO::FETCH_ASSOC);

  if($result!=null){
    session_start();
   foreach($result as $key=>$fila){
                 
      $_SESSION['nombre']=$fila["nombre"];
      $_SESSION['mailt']=$mail;
    
   }

    return true;

  }else {
    return false;
  }
  $smtp=null;                  
    $conexion=null;
 return false;
}

## mostramos la lista de solitudes activadas
function ListaBitacora(){
  $conexion =$this->conexion();
  
  $smtp=$conexion->prepare('SELECT idRegistro,CorreoSolic, 
   IFNULL (concat(Nombre," ",ApellidoP," ",ApellidoM),"ESPERA DE ASIGNACION") as nombre
   ,TipoS,FechaR,statusS  FROM  registro re left JOIN tecnico te
  ON (re.idTecnico=te.idTecnico)  where Activacion=1')  ;

  $smtp->execute();
  $result=$smtp->fetchall(PDO::FETCH_ASSOC);

  $conexion=null;
  return $result;

}
function registration_request($typeS,$mail):bool{

        $con=$this->conexion();
        
        //$consult="INSERT INTO registro(CorreoSolic,TipoS,FechaR) VALUES('".$mail."','".$typeS."',".date("Y-m-d H:i:s").")";
       $consult="call register_request(?,?);";
        $q = $con->prepare($consult);
        $q->bindParam(1,$typeS);
        $q->bindParam(2,$mail);
        
        try{           
              $q->execute();
                  
            $con=null;
                return true;
            }
            catch(Exception $r){   
            
            }
            $con=null;
            return false;
    
    

    }
function deleteHabilidad($depar,$habilidad,$priority,$strUser){
      $con=$this->conexion();
        
      $consult="delete from habilidad where idTecnico={$strUser} and Departamento='{$depar}' and 
      Habilidad='{$habilidad}' and Prioridad={$priority}";
      $smtp= $con->prepare($consult);
     
     if ( $smtp->execute()){
       return true;
     }


      return false;
    }
  
  }