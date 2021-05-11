<div class="grid-item">
 <div id="div-form">
     <form method="post" action="<? echo $_SERVER['PHP_SELF'];?>">
        <div clas="text-label">Nombre </div><div class="form-input"><input type="text" name="nombre"></div>
        <div clas="text-label">Apellido P </div><div class="form-input"><input type="text" name="apellido1"></div>
        <div clas="text-label">Apellido M </div><div class="form-input"><input type="text" name="apellido2"></div>
        <div clas="text-label">Correo </div><div class="form-input"><input type="text" name="correo"></div>


        <?php

        $resquest=$sql->query("SELECT * FROM tecnico");  /* CONSULTA GENERAL DE LOS TECNICO */
    
        if (isset($_POST["nombre"],$_POST["apellido1"],$_POST["apellido2"],$_POST["correo"])){
 
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido1"]) && !empty($_POST["apellido2"]) && 
    !empty($_POST["correo"]) ){
  
        try{
        $datos=array(trim($_POST["nombre"]),trim($_POST["apellido1"]),trim($_POST["apellido2"]),trim($_POST["correo"]),1);
        $resquestadd=$sql->query("INSERT INTO tecnico(Nombre,ApellidoP,ApellidoM,Correo) values 
        (
        '$datos[0]',
        '$datos[1]',
        '$datos[2]',
        '$datos[3]');");
            echo "<div class=\"toast_add\">Se agrego un nuevo tecnico</div>";
        } 
        catch(PDOException $e){        
        echo "<div class=\"toast_add\">".  $sql->error ." </div>";
    
        }   
    
        unset($_POST["nombre"]);
        unset($_POST["apellido1"]);
        unset($_POST["apellido2"]);
        unset($_POST["correo"]);
        unset($datos);
           
    }
  }

?>
        <div id="div-submit"><input type="submit" value="Añadir"></div>
     </form>

 
    </div>
</div>




