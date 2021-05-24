<?php
include "../Model/conecct.php";

$conn=new Connection_db();

if ($_POST['method']==3){
    $res=$conn->showHabilTen($_POST['idT']);
if ($res!=null){

    echo json_encode( $res, JSON_UNESCAPED_UNICODE);
}else {
  
    echo "error";  
}
}
else 

if ($_POST['method']==2){
    
if ($conn->DeleteKill($_POST['idT'], $_POST['Departamento'],$_POST['Habilidad'],$_POST['prioridad'])){

    echo json_encode( array("success"=>true), JSON_UNESCAPED_UNICODE);
}else {
  
    echo "error";  
}
}



