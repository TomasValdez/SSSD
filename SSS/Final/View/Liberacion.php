<?php 
    if (!isset($_GET['mail'])){
  header ("Location: index.php");
    }else {
    session_start();
    $_SESSION['mail']=$_GET['mail'];

 }
?>

<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="../Source/css/normalize.css">
<link rel="stylesheet" href="../Source/css/index.css">
<link rel="stylesheet" href="../Source/css/liberacion.css ">
<head><title>Liberacion</title></head>

<body>
<script src="../Controller/js/jquey.js"></script>

<?php include "../include/banner_tenc.php";?>
<div class="conteiner">

    <div id="div-liberacion" class="content">
      
    <div  class="mail-lib">
            <label>Calificacion</label>
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
        
        <button id="liberar_button">Liberar</button>
          </div>

    </div>
    <?php 
include "../include/Estatus_Liberacion.php";
?>
</div>

<script src="../Controller/js/liberacion.js"></script>

</body>
</html>