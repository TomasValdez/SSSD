<?php 

<<<<<<< HEAD
/*  MIRA, SI PODRIAS  COLOR LOS CARDS DE CADA UNO COMO ESTAS EN ESTOS EJEMPLOS 
=======
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../Source/css/oficial.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pragati+Narrow&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
>>>>>>> bb692f3e362ba0ed2033027b8e5fefb085df11e9

POR QUE HAY UNA CONSULTA ABAJO Y UNO ARRAY DE ESTOS 

*/

$form="<form action=\"../Controller/sendMail.php\" method=\"POST\"> ";
    $form2="</form>";

    /* ESQUIPO DE COMPUTO */
    $EQ='<div class="content-card">  
        '. $form.'
        <input type="hidden" name="solicitud" value="Equipo de cómputo">   
        <div class="heard-card" >Equipo de cómputo: </div>

        <ul>
            <li>Componente Físicos:</li>
            <li>Hace ruido</li>
            <li>No enciende el monitor, etc

            </li>
        </ul>              

        <input  type="submit" value="Solicitar">

        '.  $form2.'
    </div>';

    /* IMPRESORA */
    $IP='<div class="content-card">
                        
            '.  $form .'
            <input type="hidden" name="solicitud" value="Impresoras">
                
                    <div class="heard-card">Impresoras: </div>
                    <ul>
                    <li> Se atoró el papel</li>
                    <li>No enciende la impresora</li>
                    <li>Mancha las hojas</li>
                    <li>No funciona red</li>
                    
                    </ul>
                            
                <input type="submit" value="Solicitar">
            '.$form2.'
        </div>';

    /*EQUIPO DE COMPUTO Y SOFTWARE */
    $ST='<div class="content-card">'.
            $form.'
                            <input type="hidden" name="solicitud" value="SOFTWARE">   
                            <div class="heard-card">EQUIPO DE COMPUTO Y SOFTWARE: </div>
                            <div class="list-problem">  
                            <ul>
                                <li>No enciende el equipo</li>
                                <li>Ruidos extraños</li>
                                <li> Se bloquea el sistema o se reinicia</li>
                                <li> No funcionan las aplicaciones</li>
                                </ul>
                            </div>
                            <input  type="submit" value="Solicitar">
                            '.$form2.'
                    </div>';
    /* INTERNET Y TELEFONÍA */
    $IT='<div class="content-card">
                            
                        '.$form.'
                        <input type="hidden" name="solicitud" value="Internet">   
                        <div class="heard-card" >INTERNET Y TELEFONÍA: </div>
                        <div class="list-problem">  
            
                            <ul>
                                <li> el equipo no se conecta a internet</li>
                                <li>No puedo descargar documentos de Internet</li>
                                <li>No hay línea telefónica</li>
                                <li>No tengo acceso a números externos</li>
                            </ul>
                        </div>
                            <input  type="submit" value="Solicitar">   
                            ' .$form2.'
                    
                    </div>';

                



    /* SERVICIOS WEB Y CORREO ELECTRONICO */
    $TE='<div class="content-card">'
        . $form .'
                    <input type="hidden" name="solicitud" value="Telefono">   
                    
                        <div class="heard-card">SERVICIOS WEB Y CORREO ELECTRONICO: </div>
                        <div class="list-problem">  
                    
                        <ul>
                            <li>Problemas con el portal web</li>
                            <li>Actualización de información en el portal web</li>
                            <li>Problemas con cuenta de correo</li>
                            <li>Actualizacion de datos en cuenta de correo</li>
                        </ul>
                    </div>
                        <input  type="submit" value="Solicitar">
                    ' .$form2.'
                </div>';
    /* SII */
    $SI='<div class="content-card">
                        
                '.$form.'
                <input type="hidden" name="solicitud" value="SII">   
        
                    <div class="heard-card">SII: </div>
                    <ul>
                        <li>Problemas con el portal web</li>
                        <li>Actualización de información en el portal web </li>
                        <li>Problemas con cuenta de correo</li>
                        <li>Actualizacion de datos en cuenta de correo</li>
                    </ul>
                    
                    <input  type="submit" value="Solicitar">
                '.$form2.'
            </div>';

        
    /* OTRO */
    $OT='  <div class="content-card">
                            
        '. $form .'<input type="hidden" name="solicitud" value="Otro">  

        <div class="heard-card">Otro: </div>
     
       
        <textarea  name="otro"></textarea>
      
        <input  type="submit" value="Solicitar">
        '.$form2.'</div>'



?>


<!DOCTYPE html>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags
    
    <link rel="stylesheet" href="../oficia.css">
    
-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pragati+Narrow&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../Source/css/cardc2.css">
    <title>Cenidet  solicitud</title>
  </head>
  <body>              
    
    <header> <div class="name-title">SOLICITUD DE MANTENIMIENTO</div></header>
    <div class="label-option"><strong>Elija alguno de los siguientes casos</strong></div>
        <div id="grid-main">

                <?php
                include "../Model/conecct.php";
                session_start();
                if (!isset($_SESSION['mail']))
                {   
                    header( "location:Login.php");
                }
                
        /* LISTA PREDETERMINDAD*/

        $lisT=array($EQ=>"EQUIPO DE COMPUTO",$IP=>"IMPRESORA", $ST=>"SOFTWARE",$IT=>"INTERNET",
        $TE=>"TELEFONIA",$SI=>"SII",$OT=>"OTRO");
        
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
        echo "no hay resultado";
            $arrayF= array_diff(array_keys($lisT),$arrayn);    /* RECORRERAR OTRAS SOLITUDES SI NO FUERON ENCONTRADO EN LA BD */      
                    foreach($arrayF as $clav){
                        echo $clav;
                    }
    /*
        
        foreach($lisT as $clave => $valor){  RECORRER LA LISTA PREDERTEMINADA COMPRARANDO LA COSULTA PARA QUE SE ORDENE DE LA MAS SOLICITADO O POCO 
            echo $clave;
        
              }
                     */
            }
               ?>
               
        </div>

    </body>
</html>