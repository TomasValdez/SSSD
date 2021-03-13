<!DOCTYPE html>

<html>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   
<link  rel="stylesheet" href="../Source/css/list.css">
<head>
    <title></title>
</head>
<body>

<table class="table table-striped">
    <tbody>
        <th>#</th>
        <th>Solicitante</th>
        <th>Técnico</th>
        <th>Servicio</th>
        <th>Fech. Registro</th>
        <th>Estatus</th>
        <th></th>
    </tbody>

    <?php
    include '../Model/conecct.php';
    $con=new Connection_db();
    $sql=$con->conexion();

    $resul=$sql->query('SELECT idRegistro,es.Correo AS mail,re.idEmpleado,TipoS,FechaR,statusS,
    IFNULL (concat(em.Nombre1," ",em.Nombre2,em.Apellido1," ",em.Apellido2),"SIN DOCENTE") AS nombre FROM 
    Registro AS re INNER JOIN estudiante AS es ON re.idEstudiante=es.idEstudiante  left JOIN empleado AS em
    ON (em.idEmpleado=re.idempleado )  where Activacion=1')  ;
    
    while($fila=mysqli_fetch_assoc($resul)){
       $stat=false;
       
       switch($fila['statusS']){
           case "Espera":
                $color="colorgreen";
                $estado="Elegir";
                $stat=true; 
                $opc=1;
            break;
            case "Asignado" :
                $estado="Liberar";
                $color="colorred";
                $stat=true; 
                $opc=2;
            break;
       }
     
      echo "<tr>
        <td>{$fila['idRegistro']}</td>
        <td>{$fila['mail']}</td>
        <td>{$fila['nombre']}</td>
        <td>{$fila['TipoS']}</td>
        <td>{$fila['FechaR']}</td>
        <td>";

        if($stat==true){

        echo "<form method=POST action=../Controller/up.up> 
        <input type=\"hidden\" name=\"ids\" value={$fila['idRegistro']} ></input>
        <input type=\"hidden\" name=\"opc\" value={$fila['idRegistro']} ></input>
        <input type=submit value=\"{$estado}\"
         class= \"{$color} statusB \"  ></input></form></td></tr>";
         } else{
             echo"LIBERADO</td></tr>";
         }
 
 }


    $sql->close();

?>
    

</table>


</body>

</html>