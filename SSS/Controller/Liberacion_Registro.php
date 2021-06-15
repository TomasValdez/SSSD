<?php 

include "../Model/conecct.php";
session_start();

if (isset($_SESSION['mail'])){
    $conn=new Connection_db();
    $resultado=$conn->liberacion($_SESSION['mail'],$_POST['calificacion'],$_POST['comentario']);
    
    foreach($resultado as $fila){
    $stado=$fila["estado"];
    }
    echo json_encode(array("estado"=>$stado));
    
}