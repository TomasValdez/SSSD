<?php

use FFI\Exception;
class Connection_db{

function conexion(){
    try {
          $conn = new PDO("mysql:host=localhost;dbname=solicitud", "root", "password");
          
          
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


 $smtp=$conexion->prepare("CALL Verficacion_Correo('{$mail}')" );

  $smtp->execute();
  $result=$smtp->fetchall();

 foreach($result as $fila){
   if ($fila['estado']==1){
    return true;
   }

 }
   
    $smtp=null;                  
    $conexion=null;
    return false;

}


#2 mostramos la lista de solitudes activadas
function ListaBitacora(){
  $conexion =$this->conexion();
  
  $smtp=$conexion->prepare('SELECT idRegistro,CorreoSolic, 
   IFNULL (concat(Nombre," ",ApellidoP," ",ApellidoM),"ESPERA DE ASIGNACION") as nombre
   ,TipoS,FechaR,statusS  FROM  registro re left JOIN tecnico te
  ON (re.idTecnico=te.idTecnico)  where Activacion=1  and statusS not in("Liberado")')  ;

  $smtp->execute();
  $result=$smtp->fetchall(PDO::FETCH_ASSOC);

  $conexion=null;
  return $result;

}
#3 Registrar solucitud
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


function liberacion($correo,$calif,$Comentario){
    $con=$this->conexion();
    $consult="CALL Liberacion(?,?,?)";
    $smtp= $con->prepare($consult);

    $smtp->bindParam(1,$correo);
    $smtp->bindParam(2,$calif);
    $smtp->bindParam(3,$Comentario);
 try{   
    $smtp->execute();
    $result=$smtp->fetchAll(PDO::FETCH_ASSOC);

 }catch(Exception $e){
    echo $e;
 }

return $result;
  
}


}