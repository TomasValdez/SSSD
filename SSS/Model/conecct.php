<?php

class Connection_db{

    function conexion(){
    
        $mysqli = new mysqli("localhost", "root", "c0cac0la", "solicitud");


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

 
}