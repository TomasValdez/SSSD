<?php

$EQ='<div class="card">
        <img src="../Source/img/PC.jpg">
        <h4>EQUIPO DE COMPUTO Y SOFTWARE</h4>
        <p><li>No enciende el equipo</li>
        <li>Ruidos extraños</li>
    <li> Se bloquea el sistema o se reinicia</li>
    <li> No funcionan las aplicaciones</li>
        </p>
        <input class="boton_personalizado" id="b1" type="button" value="Solicitar">
        
    </div>
    ';

    $IP='<div class="card">
        <img src="../Source/img/impre.png">
        <h4>IMPRESORA</h4>
        <p><li>Se atoro el papel</li>
        <li>No enciende</li>
        <li> Mancha las hojas</li>
        <li> No funciona en red</li>
        </p>
        
        <input class="boton_personalizado" id="b2" type="button" value="Solicitar">
        
    </div>';


    $IT='<div class="card">

        <img src="../Source/img/INTERNET.png">
        <h4>INTERNET Y TELEFONIA</h4>
        <p><li>El equipo no se conecta a internet</li>
        <li> No puedo descargar documentos de Internet</li>
        <li>No hay línea telefónica</li>
        <li> No tengo acceso a números externos</li>
    </p>
    <input class="boton_personalizado" id="b3" type="button" value="Solicitar">       
    </div>';


    $WB='<div class="card">
        <img src="../Source/img/web y correo.jpg">
        <h4>SERVICIOS WEB Y CORREO ELECTRONICO</h4>
        <p>
        <li>Problemas con el portal web</li>
        <li>Actualización de información en el portal web</li>
        <li>Problemas con cuenta de correo</li>
        <li>Actualizacion de datos en cuenta de correo</p>
        <input class="boton_personalizado" type="button" id="b4"value="Solicitar">

    </div>';

    $SI='<div class="card">
    <img src="../Source/img/SII.png">
        <h4>SII</h4>
        <p><li>Problemas de inicio sesion</li>
        <li>Servidor caido</li>
        <li>Modificación a módulos del sistema</li>
        <li> Modificación de Reportes</li></p>
        <input class="boton_personalizado" id="b5" type="button" value="Solicitar">         
    </div>';



    $OT='<div class="card">
    <img src="../Source/img/SIGNO.png">
    <h4>OTRO</h4>
    <p></p>
    <textarea id="text" class="textarea"Style="resize:none"  placeholder="Detalles"></textarea></li></p>
    <input class="boton_personalizado" type="button" id="b6" value="Solicitar">

    </div>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu de Solicitudes</title>
    <link rel="icon" type="img/jpg" href="../Source/img/icon.jpg">
    <link rel="stylesheet" href="../Source/css/menus5.css">
    
<link rel="stylesheet" href="../Source/css/circleLoadMail1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<script src="../Controller/js/jquey.js"></script>
<?php

?>
    <div class="container" >
    
<?php
                include "../Model/conecct.php";
                
               
                
                         /* LISTA PREDETERMINDAD*/

                    $lisT=array($EQ=>"EQUIPO DE COMPUTO",
                    $IP=>"IMPRESORA",$IT=>"INTERNET",
                    $WB=>"SITIO WEB",$SI=>"SII",
                    $OT=>"OTRO");
        
                  $arrayn=array();/*ARRAY PARA TIPO DE SOLCITUD ENCONTRADA */
                     $connect=new Connection_db();
                    $sql=$connect->conexion();
                    $resul=$sql->prepare("SELECT tipoS from registro 
                    where activacion=1 group by tipoS order by count(tipos) desc");
                    $resul->execute();
                    $result=$resul->fetchall(PDO::FETCH_ASSOC);
            if ($result==null){

                   foreach($result as $fila){
                  //  while($fila=mysqli_fetch_array($result)){
                          
                        foreach($lisT as $clave => $valor){ /* RECORRER LA LISTA PREDERTEMINADA COMPRARANDO LA COSULTA PARA QUE SE ORDENE DE LA MAS SOLICITADO O POCO */                             if ($valor==strtoupper($fila[0])){
                     
                      echo $clave;
                                array_push($arrayn,$clave);
                                        break;
                                
                                }
                          }
                    }
                      $arrayF= array_diff(array_keys($lisT),$arrayn);    /* RECORRERAR OTRAS SOLITUDES SI NO FUERON ENCONTRADO EN LA BD */      
                    foreach($arrayF as $clav){
                        echo $clav;
                    }
                } 
                 else {
                $arrayF= array_diff(array_keys($lisT),$arrayn);    /* RECORRERAR OTRAS SOLITUDES SI NO FUERON ENCONTRADO EN LA BD */      
                      foreach($arrayF as $clav){
                        echo $clav;
                    }
                  // include "../include/loadMail.php";

            }
?>

        </div>
    <script src="../Controller/js/controller_cards.js">
   
    </script>
</body>
</html>