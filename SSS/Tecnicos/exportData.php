<?php

require "../Conexion/Conexion.php";


header ('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=BackupSolicitud.csv');

$output=fopen("php://output","w");


$sql=$connec->conexion();
$smtp=$sql->prepare("SELECT  reg.* ,concat(Nombre,' ',ApellidoP,' ',ApellidoM) 
as nombre from registro reg left JOIN tecnico tec on  reg.idTecnico=tec.idTecnico" );
$smtp->execute();

  $result=$smtp->fetchall(PDO::FETCH_ASSOC);

fputcsv($output,array("idRegistro",
"CorreoSolicitane",
"Tecnico",
"TipoServicio",
"status",
"FechaRegistro",
));

foreach ( $result as $row  ){
    /*
    echo $row['idRegistro'];
    echo $row['CorreoSolic'];
    echo $row['idTecnico'];
    echo $row['TipoS'];
    echo $row['statusS'];
    echo $row['FechaR'];
*/
fputcsv($output,array(
$row['idRegistro'],  
$row['CorreoSolic'],
$row['nombre'],
$row['TipoS'],
$row['statusS'],
$row['FechaR'],
),",", '"');
}


fclose($output);