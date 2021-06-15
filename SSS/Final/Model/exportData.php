<?php

require "../Model/conecct.php";
$connec=new Connection_db();

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
'FechaL',
'Valoracion',
'Comentario',
'Activacion',
));

foreach ( $result as $row  ){
  
fputcsv($output,array(
$row['idRegistro'],  
$row['CorreoSolic'],
$row['nombre'],
$row['TipoS'],
$row['statusS'],
$row['FechaR'],
$row['FechaL'],
$row['Valoracion'],
$row['Comentario'],
$row['Activacion'],
),",", '"');
}


fclose($output);