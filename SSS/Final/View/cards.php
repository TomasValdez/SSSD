
<?php
session_start();
  
  echo  "base-- ".$_SESSION['bd']; 
  echo "<br>";

if(!isset($_SESSION['mail'])){
echo "<script>  window.history.back();</script>";
}

    $EQ='<div class="card" style="width: 18rem;">
    <div><img class="card-img-top" src="../Source/img/PC.jpg" alt="Card image cap">
  
    <h4 class="card-title">EQUIPO DE COMPUTO Y SOFTWARE</h4>
    <p><li>No enciende el equipo</li>
    <li>Ruidos extraños</li>    
    <li> Se bloquea el sistema o se reinicia</li>
    <li> No funcionan las aplicaciones</li>
    </p>
    </div>

    <div>
    <input class="boton_personalizado" id="b1" type="button" value="Solicitar">
    </div>
</div>';


    $IP='<div class="card">
    <div>
        <img src="../Source/img/impre.png">
        <h4>IMPRESORA</h4>
        <p><li>Se atoro el papel</li>
        <li>No enciende</li>
        <li> Mancha las hojas</li>
        <li> No funciona en red</li>
        </p>
        </div><div>
        <input class="boton_personalizado" id="b2" type="button" value="Solicitar">
        </div>
    </div>';


    $IT='<div class="card">
    <div>
    <img src="../Source/img/INTERNET.png">
        <h4>INTERNET Y TELEFONIA</h4>
    
        <p><li>El equipo no se conecta a internet</li>
        <li> No puedo descargar documentos de Internet</li>
        <li>No hay línea telefónica</li>
        <li> No tengo acceso a números externos</li>
        </p>
    </div>
    
     <div>
    <input class="boton_personalizado" id="b3" type="button" value="Solicitar">       
    </div>

    </div>';


    $WB='<div class="card">
    <div>
        <img src="../Source/img/web y correo.jpg">
        <h4>SERVICIOS WEB Y CORREO ELECTRONICO</h4>
        <p>
        <li>Problemas con el portal web</li>
        <li>Actualización de información en el portal web</li>
        <li>Problemas con cuenta de correo</li>
        <li>Actualizacion de datos en cuenta de correo</p>
        </div><div>
        <input class="boton_personalizado" type="button" id="b4"value="Solicitar">
        </div>
    </div>';

    $SI='<div class="card">
    <div>
    <img src="../Source/img/SII.png">
        <h4>SII</h4>
        <p><li>Problemas de inicio sesion</li>
        <li>Servidor caido</li>
        <li>Modificación a módulos del sistema</li>
        <li> Modificación de Reportes</li></p>
        </div>
        <div>
        <input class="boton_personalizado" id="b5" type="button" value="Solicitar">    
        </div>     
    </div>';



    $OT='<div class="card">
    <div>
    <img src="../Source/img/SIGNO.png">
    <h4>OTRO</h4>
    </div>
    <textarea id="text" class="textarea"Style="resize:none"  placeholder="Detalles"></textarea></li></p>
    <div>
    <input class="boton_personalizado" type="button" id="b6" value="Solicitar">
    <div>
    </div>';
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Menu de Solicitudes</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <link rel="icon" type="img/jpg" href="../Source/img/icon.jpg">
    <link rel="stylesheet" href="../Source/css/menus.css">
    
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

            }
?>

        </div>
    <script src="../Controller/js/controller_cards2.js">
   
    </script>
</body>
</html>