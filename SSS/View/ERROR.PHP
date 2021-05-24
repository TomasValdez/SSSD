 <!--
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
       
    <div class="grid-item">
        <div id="selec-item">
            
        <?php 
            if (isset($_POST['idtecnico']) && isset($status)!=0 ){ //* MOSTRAREMOS LA LISTA  DE LOS TECNICO */
          
          ?>
          <form method="post" action="<?php echo "addkill.php"; ?>"><?PHP
                                    /*Mostrar las area */
                 echo "<input type=\"hidden\" name=\"idtecnico\" value=\"{$_POST['idtecnico']}\" class=\"hidden\">";
                 
                
                echo "<select class=\"nameArea\" name=\"nameArea\" >
                <option selected disabled >ELEGIR AREA</option>";
                foreach ($areas as $area){
                echo "<option value= \"".mb_strtoupper($area,'UTF-8')."\">".mb_strtoupper($area,'UTF-8')."</option>";
                }
                                 /*LISTA DE PROBLEMAS*/
                echo "</select >
                <select id=\"nameProblem\" name=\"nameProblem\">               
                <option selected disabled >ELEGIR HABILIDAD</option>";
                foreach ($tipoProblema as $problemas  ){
                    echo "<option value=\"{$problemas}\">".$problemas."</option>";
                    }
                    echo "</select>";                      
                    
                echo "<select id=\"priority\" name=\"priority\"> 
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
<script src="../Controller/js/crud.js"></script>
</div>



<div class="content-item1">
<div id="response">
<?php 
include "../include/addTecn.php";
?>
</div>

</div>
