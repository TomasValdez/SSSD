<?php
require "../Model/conecct.php";

$conn=new Connection_db();

$depar=$_POST['dep'];
$habilidad=$_POST['habil'];
$priority=$_POST['Priority'];
$strUser=$_POST['strUser'];

if ($_POST['method']="delete"){
    if (
$conn->deleteHabilidad($depar,$habilidad,$priority,$strUser)){
    echo json_encode(array("success"=>true));
}
else {
    echo json_encode(array("success"=>false));

}
}



