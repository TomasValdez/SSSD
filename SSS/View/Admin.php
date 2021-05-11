<?php 
    require "../Model/conecct.php";

    $connect=new Connection_db();
    $sql=$connect->conexion();
    $tipoProblema=array( "SITIO WEB",
        " CORREO",
        "EXAMEN EN LINEA",
        "MT.PREVENTICO",
        "PROGRAMACION",
        "REDES",
        "SII",
        "SOFTWARE",
        "EXAMEN DE ADMISION",
        "REUNIONES DIFUSION"
    );


    $areas=array( 
        "M-Mecánica",
        "M-Electrónica",
        "M-Computación ",
        "D-Electrónica ",
        "D-Computación",
        "DEPTO. DE  COMUNICACIÓN Y EVENTOS",
        " DEPTO. DE INGENIERÍA  MECÁNICA    ",
        "DEPTO. DE INGENIERÍA  ELECTRÓNICA                ",
        "DEPTO. DE CIENCIAS COMPUTACIONALES               ",
        "DEPTO. DE RECURSOS FINANCIEROS                   ",
        "DEPTO. DE DESARROLLO ACADÉMICO E IDIOMAS         ",
        "CENTRO DE INFORMACIÓN                            ",
        "DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS       ",
        "DIRECCIÓN                                        ",
        "DEPTO. DE SERVICIOS ESCOLARES                    ",
        "SUBDIRECCIÓN DE SERVICIOS ADMINISTRATIVOS        ",
        "DEPTO. DE ORGANIZACIÓN Y SEGUIMIENTO DE ESTUDIOS ",
        "DEPTO. DE RECURSOS HUMANOS                       ",
        "SUBDIRECCIÓN ACADÉMICA                           ",
        " DEPTO. DE COMUNICACIÓN Y EVENTOS                 ",
        "SUBDIRECCIÓN DE PLANEACIÓN Y VINCULACIÓN         ",
        "DEPTO. CENTRO DE INFORMACIÓN                     ",
        "DEPTO.  DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN"
    );

    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

    if (!isset($_POST['id'])){
  //   header"(location:LoginAdmin.php)";
  
    }

    if (isset($_POST["enable"])){ /* actulizar el estado del tecnico */
        $Updatestatus=$sql->query("UPDATE tecnico SET status=1 where idtecnico={$_POST["enable"]} "); 
            
        }else
        if (isset($_POST["disable"])){
        $Updatestatus=$sql->query("UPDATE tecnico SET status=0 where idtecnico={$_POST["disable"]} ");  
    }



    if (isset($_POST["idtecnico"],$_POST["nameArea"],$_POST["nameProblem"],$_POST["priority"])){
        try{
            $resqueste=$sql->query("INSERT INTO habilidad VALUES({$_POST["idtecnico"]} ,\"{$_POST["nameArea"]}\" , \"{$_POST["nameProblem"]}\",{$_POST["priority"]})"); 
        unset($_POST["nameArea"],$_POST["nameProblem"],$_POST["priority"]);
    
      }
      catch(PDOException $e) {
        echo "No insertado".$e->getMessage();
     
      }

    }
    
?>

<html >

<head>
<meta http-equiv="Pragma" content="no-cache">
<link rel="stylesheet" href="../Source/css/crud.css">
<link rel="stylesheet" href="../Source/css/index.css">
<title></title></head>
<body>
<?php include "../include/banner_tenc.php";?>
<script src="../Controller/jquey.js"></script>
<div id="conteiner">
    <div class="grid-item">
        <form method="POST" action="addkill.php">
        tecnico<input type="submit" name="opc1" >
        habilidad<input type="submit" name="opc2">
        </form>
    </div>

    <?php 
     $opc=2;
        if (isset($_POST['opc1']) ){
            include "../include/addTecn.php";
        } else if (isset($_POST['opc2']) ){
            include "../include/listTecn.php";
            
        }
        else {
            include "../include/listTecn.php";
        }

    ?>
        
    <div class="grid-item">
        <div id="selec-item">
            
        <?php 
            if (isset($_POST['idtecnico']) && isset($status)!=0 ){ //* MOSTRAREMOS LA LISTA  DE LOS TECNICO */
          
          ?>
          <form method="post" action="<?php echo "addkill.php"; ?>"><?PHP
                                    /*Mostrar las area */
                 echo "<input type=\"hidden\" name=\"idtecnico\" value=\"{$_POST['idtecnico']}\" class=\"hidden\">";
                 
                
                echo "<select name=\"nameArea\">
                <option selected disabled >ELEGIR AREA</option>";
                foreach ($areas as $area){
                echo "<option value= \"".mb_strtoupper($area,'UTF-8')."\">".mb_strtoupper($area,'UTF-8')."</option>";
                }
                                 /*LISTA DE PROBLEMAS*/
                echo "</select >
                <select name=\"nameProblem\">               
                <option selected disabled >ELEGIR HABILIDAD</option>";
                foreach ($tipoProblema as $problemas  ){
                    echo "<option value=\"{$problemas}\">".$problemas."</option>";
                    }
                    echo "</select>";                      
                    
                echo "<select name=\"priority\"> 
                <option selected disabled >PRIORIDAD</option>";  /*NUMERO DE PRIORIDAD */
                for ($x=5;$x>0;$x--){
                echo "<option value=\"{$x}\">{$x}</option>";
                }

                echo "</select> 
                <input type=\"submit\" value=\"Añadir\"></input>";
            ?></form><?php
             }else   {
            ?>
                <select> <option select disabled >Vacio</option></select>
                <select><option select disabled >Vacio</option></select>
                <select><option select disabled >Vacio</option></select>
            <?php 
            }
            ?>

        </div>
    </div>
  
    <div class="grid-item">
        <table id="table">
            <tr>
                
            <th>DEPARTAMENTO</th>
            <th>HABILIDAD</th>
            <th>PRIORIDAD</th>
            
            <th></th>
            </tr>
            <tbody>
            <?php
           // header('Location:' . getenv('HTTP_REFERER'));
             try{               
            if(isset($_POST['idtecnico']) ){  
               
            $resquestTecn=$sql->prepare("SELECT hab.* FROM tecnico tec right JOIN 
            habilidad hab  on tec.idtecnico=hab.idtecnico where
            hab.idtecnico='".$_POST['idtecnico']."'");
                $resquestTecn->execute();
                    /*Mostrar datos del tecnico */
                   // while ($datostec = mysqli_fetch_array($resquestTecn)){
                       $resultado = $resquestTecn->fetchAll();
                foreach($resultado as  $ke=>$datostec){ 
                    echo "<tr><td>{$datostec[1]}</td>
                                <td>{$datostec[2]}</td>
                                <td>{$datostec[3]}</td>
                                <td><a id=\"Buttondelete\" class=\"mailb\">Eliminar</a></td>
                                </tr>";
                        }     
                    }       }catch(PDOException $e)
                {
                        echo "Error ".$e->getMessage;
                }

         $connect=null;
            ?>
            </tbody>
        </table>
    </div>
<script src="../Controller/crud.js"></script>
</div>

</body>
</html>