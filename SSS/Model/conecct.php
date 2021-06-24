<<<<<<< HEAD
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
  ON (re.idTecnico=te.idTecnico)  where Activacion=1  and statusS not in("Liberado")')  ;

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
  
  



function backuRegistro(){

    $con=$this->conexion();
    $consult="select *  from registro";
    $smtp= $con->prepare($consult);
    $smtp->execute();
    $r=$smtp->fetchall(PDO::FETCH_ASSOC);
  
    $smtp=null;
    $con=null;
     return $r;
}

  
function  showTecnico(){
    $con=$this->conexion();
    $consult="SELECT idTecnico, concat (Nombre ,'' ,ApellidoP,' ',ApellidoM) as nombre ,'status'  from tecnico";
    $smtp= $con->prepare($consult);
    $smtp->execute();
    $r=$smtp->fetchall();

    $con=null;
  return $r;
}

function  addtec(){


    $con=$this->conexion();
    $consult="select *  from registro";
    $smtp= $con->prepare($consult);
    $smtp->execute();
    $r=$smtp->fetchall(PDO::FETCH_ASSOC);
  
    $smtp=null;
    $con=null;
  }

 function showHabilTen($idT){
    $con=$this->conexion();
    $consult="SELECT *  from habilidad where idTecnico={$idT}";
    $smtp= $con->prepare($consult);
    $smtp->execute();
    $r=$smtp->fetchall(PDO::FETCH_ASSOC);
  
    $smtp=null;
    $con=null;

    return $r;
  }
function DeleteKill($idT,$departamento,$habilidad,$prioridad){
    $con=$this->conexion();
    $consult="DELETE from habilidad where idTecnico={$idT} and Departamento='{$departamento}' and habilidad='{$habilidad}' and prioridad={$prioridad}";
    $smtp= $con->prepare($consult);
   if ( $smtp->execute()){
     return true;
   }
   return false;
  }



  function liberacion($correo,$calif,$Comentario){
    $con=$this->conexion();
    $consult="CALL Liberacion(?,?,?)";
    $smtp= $con->prepare($consult);

    $smtp->bindParam(1,$correo);
    $smtp->bindParam(2,$calif);
    $smtp->bindParam(3,$Comentario);
    
    $smtp->execute();
    $result=$smtp->fetchall(PDO::FETCH_ASSOC);


return $result;
  }
=======
<?php

class Connection_db{

    function conexion(){
    
        $mysqli = new mysqli("localhost", "root", "", "prueba");


            if ($mysqli->connect_errno) {
                //echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . 
                $mysqli->connect_error;
                    echo "Creo que tenemos algunas Fallas";
            }else{
            // echo "conexion exitosa";
            return $mysqli;
        }
      
    }

    function registration_request($typeS,$mail,$tok):int{
        $con=$this->conexion();
        
        //$consult='CALL registration2(?,?)';
        $consult='CALL registractionSolcitud(?,?,?)';
        $q = $con->prepare($consult);
        
        $q->bind_param("sss",$typeS,$mail,$tok);
           
        if ($q->execute()) {
            
            $id=$con->query('SELECT MAX(idRegistro) as idRegistro from Registro');

            while ($fila = mysqli_fetch_row($id)) {
              $idr= intval( $fila[0]);
            }    
         }else{
            echo "Fallo Proceso de almacenamiento " . mysqli_error($q);
            
 
        }
            $q->close();
            
            $con->close();
            return $idr;

    }

 
>>>>>>> bb692f3e362ba0ed2033027b8e5fefb085df11e9
}