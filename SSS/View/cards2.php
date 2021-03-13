<!DOCTYPE html>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../Source/css/oficial2.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pragati+Narrow&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">

    <title>Cenidet  solicitud</title>
  </head>
  <body>              
 <?php 

  include '../Model/conecct.php';

    $con=new Connection_db();

            $correo=$_POST["Mail"];

    if (!isset($_POST["Mail"]) || ($correo=="")){
        header("location:registerMail.php");
    }
    else  if (isset($_POST["Mail"]) && ($correo!=="")){
        $sql=$con->conexion();

            $resul=$sql->query("CALL Veref('{$correo}');");
            while ($fila=mysqli_fetch_assoc($resul)){
           
                switch ($fila["v"]){
                    case "No":
                        header("location:registerMail.php"); 
                     break;
                }
                break;
            }
     
            $sql->close();  
   } 

  ?>
    <header> <div class="name-title">SOLICITUD DE MANTENIMIENTO</div></header>
    <div class="label-option"><strong>Elija alguno de los siguientes casos</strong></div>
        <div class="grid-main">


                    <div class="content-card">
                        <form method="POST" action="../Controller/sendMail.php">
                            
                        <input type="hidden" name="solicitud" value="Equipo de cómputo">   
                            <input type="hidden" name="mail" value="<?php echo $correo ?>"> 
                            
                            <div class="heard-card" >Equipo de cómputo: </div>
                            
                                <ul>
                                    <li>Componente Físicos:</li>
                                    <li>Hace ruido</li>
                                    <li>No enciende el monitor, etc
            
                                    </li>
                                </ul>              
                    
                                <input  type="submit" value="Solicitar">
                    
                            </form>
                
                    </div>
            
                    <div class="content-card">
                        <form method="POST" action="../Controller/sendMail.php">
                            <input type="hidden" name="solicitud" value="Impresora">
                            <input type="hidden" name="mail" value="<?php echo $correo ?>">  
        
                            <div class="heard-card">Impresora: </div>
                                <ul>
                                    <li> Se atoró el papel</li>
                                    <li>No enciende</li>
                                    <li>No enciende el monitor, etc</li>
                                    <li>No imprime, etc..</li>
                                </ul>
                                
                                <input type="submit" value="Solicitar">
                        </form>
                    </div>

                    <div class="content-card">

                     <form method="POST" action="../Controller/sendMail.php">
                        <input type="hidden" name="solicitud" value="Software">   
                        <input type="hidden" name="mail" value="<?php echo $correo ?>">
                        <div class="heard-card">Software: </div>
                        <div class="list-problem">  
                            <ul>
                                <li>licencias para usar programas</li>
                                <li>instalación/desinstalación de programas, etc.</li>
                                </ul>
                            </div>
                            <input  type="submit" value="Solicitar"></form>
                        </form>
                    </div>

                    <div class="content-card">

                      <form method="POST" action="../Controller/sendMail.php">
                        <input type="hidden" name="solicitud" value="Internet">   
                        <input type="hidden" name="mail" value="<?php echo $correo ?>"> 
                        <div class="heard-card" >Internet: </div>
                        <div class="list-problem">  
            
                            <ul>
                                <li> el equipo no se conecta a internet</li>
                                <li>no abre algunas páginas, etc.</li>
                            </ul>
                        </div>
                            <input  type="submit" value="Solicitar"></form>
                    
                    </div>

                
                    <div class="content-card">
                        <form method="POST" action="../Controller/sendMail.php">
                        <input type="hidden" name="solicitud" value="Telefono">   
                        <input type="hidden" name="mail" value="<?php echo $correo ?>"> 
                        
                            <div class="heard-card">Teléfonía: </div>
                            <div class="list-problem">  
                        
                            <ul>
                                <li>no hay línea cambio de nombre asignación de número.</li>
                            </ul>
                        </div>
                            <input  type="submit" value="Solicitar"></form>
                    </div>

                    <div class="content-card">
                        <form method="POST" action="../Controller/sendMail.php">
                        <input type="hidden" name="solicitud" value="SI">   
                        <input type="hidden" name="mail" value="<?php echo $correo ?>"> 
    
                            <div class="heard-card">SII: </div>
                            <ul>
                                <li>olvido de contraseña</li>
                                <li>información incorrecta </li>
                                <li>no almacena información, etc.</li>
                            </ul>
                            
                            <input  type="submit" value="Solicitar"></form>
                    </div>

                    <div class="content-card">
                        <form method="POST" action="../Controller/sendMail.php">
                            <input type="hidden" name="solicitud" value="Otro">  
                            <input type="hidden" name="mail" value="<?php echo $correo ?>">  
    
                                <div class="heard-card">Otro: </div>
                                <div class="list-problem"> 
                                <ul>
                                    Escribe cuál es su problema de la manera más detallada posible.
                                </ul>
                                <textarea placeholder="Escribe mas detallado su problema" name="otro"></textarea>
                        
                                </div>
                            <input  type="submit" value="Solicitar"></form>
                    </div>
        </div>

    </body>
</html>