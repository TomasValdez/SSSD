<?php 
include "Model/conecct.php";
$conn=new Connection_db();
$sql=$conn->conexion();

$id=$_POST['ids'];
$opc=$_POST['opc'];
$comentario="nunguna";

    header("location:Empleado.php");

    if ($opc==="1"){
    
    }
    else if($opc==="2"){
        $prep=$sql->prepare("CALL liberation(?,?,?);");
        $prep->bind_param("iis",$id,$valoracion,$comentario);
        if($prep->execute()){}
    
    }


$sql->close();