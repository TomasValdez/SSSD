



<div class="grid-item">
 <div id="div-form">
        <div clas="text-label">Nombre </div><div class="form-input"><input type="text" name="nombre"></div>
        <div clas="text-label">Apellido P </div><div class="form-input"><input type="text" name="apellido1"></div>
        <div clas="text-label">Apellido M </div><div class="form-input"><input type="text" name="apellido2"></div>
        <div clas="text-label">Correo </div><div class="form-input"><input type="text" name="correo"></div>


        <?php
/*        include "../Model/conecct.php";

        $con=new Connection_db();
        $sql=$con->conexion();
        $resquest=$sql->query("SELECT * FROM tecnico");  
  
        try{
        $datos=array("nombre","apellido1",
        "apellido2","correo");
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
    */
  

?>
        <div id="div-submi"><input type="button" id="button-add" value="Añadir"></div>

 
    </div>
</div>

<script src="../Controller/js/addTecn.js"></script>




