<!DOCTYPE html>

<html>
    
<link rel="stylesheet" href="../Source/css/index.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   
<link  rel="stylesheet" href="../Source/css/lista.css">
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
    <a href="../Model/loginout.php">Cerrar session</a>
    </div>
</header>
<div >BIENVENIDO <?PHP 
    session_start();
    echo $_SESSION['nameT'] ?></div>
<table class="table table-striped">
    <tbody>
        <th>#</th>
        <th>Solicitante</th>
        <th>Técnico</th>
        
    </tbody>

    <?php


    include '../Model/conecct.php';
    $con=new Connection_db();
    $sql=$con->conexion();
    
    if ($Ctecnico=isset($_SESSION['mailT'])){
    /*
    $resul=$sql->query('SELECT idRegistro,es.Correo AS mail,re.idEmpleado,TipoS,FechaR,statusS,
    IFNULL (concat(em.Nombre1," ",em.Nombre2,em.Apellido1," ",em.Apellido2),"SIN DOCENTE") AS nombre FROM 
    Registro AS re INNER JOIN estudiante AS es ON re.idEstudiante=es.idEstudiante  left JOIN empleado AS em
    ON (em.idEmpleado=re.idempleado )  where Activacion=1');
    */
    
    $resul=$sql->query("SELECT idRegistro,CorreoSolic AS mail FROM 
    Registro2  re inner JOIN tecnico  te ON re.idtecnico=te.idtecnico 
    where Activacion=1 and statusS='Asignado' and 
    re.idtecnico in (select tec.idtecnico from tecnico tec where  tec.Correo='{$Ctecnico}')" );

    while($fila=mysqli_fetch_assoc($resul)){
       
      echo "<tr>
        <td>{$fila['idRegistro']}</td>
        <td>{$fila['mail']}</td>
        <td>Asignado</td>
        <td>Enviar Correo</td></tr>";
         
 
 }


    $sql->close();
    }
    else {
        header("location:../View/LoginTec.php");
    }
?>
    

</table>


</body>

</html>