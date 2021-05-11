<div  class="grid-item">
            <div id="div-form">
                <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                    <div clas="text-label">Nombre </div>
                    <input type="hidden" name="opc2" >
                    <div class="form-input">
                            <select name="idtecnico" id="idtecnico-List"onchange="this.form.submit()">
                                <option  disabled selected> ELIGA TECNICO</option>
                                <?php 
                                try {
                             $resquest=$sql->prepare("SELECT * FROM tecnico");  /* CONSULTA GENERAL DE LOS TECNICO */
                                 $resquest->execute();

                            //while ($datos = mysqli_fetch_array($resquest)){  /** Mostramos los tecnico */
                            $result = $resquest->fetchAll();
  
                            foreach( $result  as $key=>$datos){
                                $nombre=utf8_encode($datos[1]." ". $datos[2]." ". $datos[3]);
                                if (!isset($_POST['idtecnico'])){   
                                     echo "<option value=\"{$datos[0]}\" >{$nombre}</option>";
                                            
                                  }else 
                                  if (isset($_POST['idtecnico'])){
                                            if ($_POST['idtecnico']==$datos[0]){
                                                echo "<option value=\"{$datos[0]}\" selected>{$nombre}</option>";
                                                $status=$datos[5];
                                                $valor=$_POST['idtecnico'];
                                                }else {
                                                    
                                                //echo "Se se encontro algo";
                                                echo "<option value=\"{$datos[0]}\" >{$nombre}</option>";
                                            
                                            
                                            }
                                }
                              }
                        
                            
                                }catch(PDOException $e) {
                             echo "Error: " . $e->getMessage();
                                        }
                            
                            ?>
                            
                            </select><div id="statusT"><div id="status-Aling"><?php 
                                                                    
                                        if (isset($valor)){ /*Vereficaremos que un array este libre para traer datos de La DB para */
                                                if (isset($status)){          /* HABILIDAR O DESABILITAR TECNICO */
                                                        switch($status){
                                                            case 0:                /*DESABILITADO EN TECNICO */
                                                    echo "<input type=\"hidden\" name=\"enable\" value=\"{$valor}\" class=\"hidden\">";
                                                echo " <label >Activadar </label><input type=\"submit\" class=\"RadioButton\" value=\"\">";
                                                echo "<label >Desactivado</label><div  class=\"RadioButton active\"></div> </div>";
                                                
                                                        break;
                                                        case 1:        /*HABILITADO EN TECNICO */                                                 
                                                    echo "<input type=\"hidden\" name=\"disable\" value=\"{$valor}\" class=\"hidden\">";
                                                echo " <label >Activado</label><div  class=\"RadioButton active\"></div>";
                                                echo "<label >Desactivar</label><input type=\"submit\" class=\"RadioButton\" value=\"\"> </div>";
                                                
                                                        break;
                                         }
                                         } 
                                        }else{
                                            echo "<div><label >Activado</label><div  class=\"RadioButton\"></div></div>";
                                            
                                            echo "<div><label >Desactivado</label><div  class=\"RadioButton\"></div></div></div>";
                                        }
                                        ?>
                    </div>
                    </div>
                 </form>
             </div>                   
        </div>