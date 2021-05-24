<?php 
if (!isset($_GET['mail'])){
}else {
    session_start();
    $_SESSION['mail']=$_GET['mail'];

}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../Source/css/normalize.css">
<link rel="stylesheet" href="../Source/css/liberacion.css ">
<head><title>Liberacion</title></head>

<body>
<script src="../Controller/js/jquey.js"></script>
<div class="conteiner">
    <div class="content">
      
        <div class="mail-lib">
            <label>Evluacion</label>
            <select id="calificacion">
            <?php
            for ($num=0;$num<6;$num++){
                    echo "<option>".$num."</option>";
            }
            ?>
            </select>
        </div>

        <div class="mail-lib"> 
        
            <label>Comentario</label>
            <textarea id="comentario">
            </textarea> 
        </div>
        <div class="mail-lib"> 
        
        <button id="liberar_button">Ok</button>
     
          </div>

        
    </div>
</div>
<script src="../Controller/js/liberacion.js"></script>

</body>
</html>