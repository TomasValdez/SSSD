<?php
require "../Model/conecct.php";

$conn=new Connection_db();
$ruta ="C:/mi_archivo.csv";

$datos[0]=array('idRegistro'
    ,'CorreoSolic',
    'idTecnico',
    'TipoS',
    'statusS',
    'FechaR',
    'FechaL',
    'Valoracion',
    'Comentario',
    'Activacion');
    
$s=$conn->backuRegistro();
$cont=1;
foreach($s as $result){
    $datos[$cont]=array(
    $result['idRegistro'],
    $result['CorreoSolic'],
    $result['idTecnico'],
    $result['TipoS'],
    $result['statusS'],
    $result['FechaR'],
    $result['FechaL'],
    $result['Valoracion'],
    $result['Comentario'],
    $result['Activacion'],
    );
    $con++;
    }

generarCSV($datos, $ruta, $delimitador = ';', $encapsulador = '"');

function generarCSV($datos, $ruta, $delimitador, $encapsulador){
  //  $file_handle = fopen($ruta, 'w');
    foreach ($datos as $linea) {
      fputcsv( $linea, $delimitador, $encapsulador);
    }
    
   # rewind($file_handle);
   # fclose($file_handle);
   #$file_handle
  }