<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="../Source/css/lista.css">

<head>
    <title></title>
</head>

<body>
<div  class="logo-head"> 
        <div clas="logo-item"><h2>CENTRO NACIONA DE INVESTIGACION
        Y DESARROLO TECNOLOGICO</h2></div>
        <div clas="logo-item"><a href="https://cenidet.tecnm.mx/">  
        <img src="../Source/img/tecnm.png" class="img-logo"></a></div>
        <div clas="logo-item"><h2>INSTITUTO TECNOLOGICO DE MEXICO</h2></div>
</div>

<header>
<div class="line-menu"></div>
    <div class="menu-div">
    <a href="index.php">INICIO</a>
    </a>
    </div>
</header>

<div class="title-div">LISTA DE SOLICITUDES</div>

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
    $con=new Connection_db();
    $sql=$con->conexion();

  
   
  $resul=$sql->query('SELECT idRegistro,CorreoSolic, 
  IFNULL (concat(Nombre," ",ApellidoP," ",ApellidoM),"SIN TECNICO") as nombre
   ,TipoS,FechaR,statusS  FROM  Registro2 re left JOIN Tecnico te
  ON (re.idTecnico=te.idTecnico)  where Activacion=1')  ;

    while($fila=mysqli_fetch_assoc($resul)){
     echo "<tr>
        <td>{$fila['idRegistro']}</td>
        <td>{$fila['CorreoSolic']}</td>
        <td>{$fila['nombre']}</td>
        <td>{$fila['TipoS']}</td>
        <td>{$fila['FechaR']}</td>
        <td>{$fila['statusS']}</td>
        </tr>";
    
 }
    $sql->close();
?>
    

</table>



</body>

</html>