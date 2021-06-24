<?php

include("../Conexion/Conexion.php");

$sql="SELECT* FROM tecnicoss";
$ejecutar=mysqli_query($conexion, $sql);
while($mysql_fetch_array($ejecutar)){
  
  ?>
  
  <tr>
    <td><? php echo $fila[0] ?></td>
    <td><? php echo $fila[1] ?></td>
    <td><? php echo $fila[2] ?></td>
    <td><? php echo $fila[3] ?></td>
    <td><? php echo $fila[4] ?></td>
    <td><? php echo $fila[5] ?></td>
  </tr>

  <?php} ?> 
  
  <br><br>
  <a href="./excel.php" class="btn-small blue">Descargar excel</a>

}

