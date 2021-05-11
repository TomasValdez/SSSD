<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<link rel="stylesheet" href="../Source/css/index.css">
<head>
    <title></title>
</head>

<body>

<?php include "../include/banner_tenc.php";?>
<header>

<div class="title-div">LISTA DE SOLICITUDES</div>

</header>

<table class="table table-striped">
    <tbody>
        <th>#</th>
        <th>Solicitante</th>
        <th>Tecnico</th>
        <th>Servicio</th>
        <th>Fech. Registro</th>
        <th>Estatus</th>
    </tbody>

    <?php
    include '../Model/conecct.php';
    $conn=new Connection_db();
  foreach($conn->ListaBitacora() as $fila){
     echo "<tr>
        <td>{$fila['idRegistro']}</td>
        <td>{$fila['CorreoSolic']}</td>
        <td>{$fila['nombre']}</td>
        <td>{$fila['TipoS']}</td>
        <td>{$fila['FechaR']}</td>
        <td>{$fila['statusS']}</td>
        </tr>";
    
 }
?>
    

</table>



</body>

</html>