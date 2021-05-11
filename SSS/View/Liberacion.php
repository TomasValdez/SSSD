<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../Source/css/liberacion.css ">
<head><title>Liberacion</title></head>

<body>

<div class="conteiner">
    <div class="mail-lib"> 
        <label>correo</label>
        <input type="text">
    </div>
   
    <div class="mail-lib"> 
    
        <label>Comentario</label>
        <textarea >
        </textarea> 
    </div>

    <div >
        <label>Evluacion</label>
        <select>
        <?php
        for ($num=0;$num<6;$num++){
                echo "<option>".$num."</option>";
        }
        ?>
        </select>
    </div>

</div>
</body>
</html>