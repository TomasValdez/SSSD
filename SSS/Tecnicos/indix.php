<?php


$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidoP=(isset($_POST['txtApellidoP']))?$_POST['txtApellidoP']:"";
$txtApellidoM=(isset($_POST['txtApellidoM']))?$_POST['txtApellidoM']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtDepartamento=(isset($_POST['txtDepartamento']))?$_POST['txtDepartamento']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;
 
include("../Conexion/Conexion.php");



switch($accion){
    case"btnAgregar":
        $sentencia=$pdo->prepare("INSERT INTO tecnicoss(nombreTecnico,apellidoP,apellidoM,correoTecnico,departamento,fotoTecnico) VALUES(:nombreTecnico,:apellidoP,:apellidoM,:correoTecnico,:departamento,:fotoTecnico)");
       
        $sentencia->bindParam(':nombreTecnico',$txtNombre);
        $sentencia->bindParam(':apellidoP',$txtApellidoP);
        $sentencia->bindParam(':apellidoM',$txtApellidoM);
        $sentencia->bindParam(':correoTecnico',$txtCorreo);
        $sentencia->bindParam(':departamento',$txtDepartamento);

        $Fecha= new DateTime();
        $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";

        $tmpFoto=$_FILES["txtFoto"]["tmp_name"];

        if($tmpFoto!=""){
            move_uploaded_file($tmpFoto,"../Source/img/".$nombreArchivo);
        }


        $sentencia->bindParam(':fotoTecnico',$nombreArchivo);
        $sentencia->execute();
        header('Location: indix.php');
        
     break;

        case"btnModificar":

        $sentencia=$pdo->prepare("UPDATE tecnicoss 
        SET nombreTecnico=:nombreTecnico,
        apellidoP=:apellidoP,apellidoM=:apellidoM,
        correoTecnico=:correoTecnico,
        departamento=:departamento
         WHERE idTecnico=:idTecnico");
        
       
        $sentencia->bindParam(':nombreTecnico',$txtNombre);
        $sentencia->bindParam(':apellidoP',$txtApellidoP);
        $sentencia->bindParam(':apellidoM',$txtApellidoM);
        $sentencia->bindParam(':correoTecnico',$txtCorreo);
        $sentencia->bindParam(':departamento',$txtDepartamento);
        $sentencia->bindParam(':idTecnico',$txtID);
        $sentencia->execute();


        $Fecha= new DateTime();
        $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";

        $tmpFoto=$_FILES["txtFoto"]["tmp_name"];

        if($tmpFoto!=""){
            move_uploaded_file($tmpFoto,"../Source/img/".$nombreArchivo);
        

            $sentencia=$pdo->prepare("SELECT fotoTecnico FROM tecnicoss
            WHERE idTecnico=:idTecnico"); 
            $sentencia->bindParam(':idTecnico',$txtID);
            $sentencia->execute();
            $tecnicoss=$sentencia->fetch(PDO::FETCH_LAZY);

                print_r($tecnicoss);

                if(isset($tecnicoss["fotoTecnico"])){
                    if(file_exists("../Source/img/".$tecnicoss["fotoTecnico"])){
                        if($item['Foto']!="imagen.jpg"){
                        unlink("../Source/img/".$tecnicoss["fotoTecnico"]);
                        }
                    }
                }


            $sentencia=$pdo->prepare("UPDATE tecnicoss SET fotoTecnico=:fotoTecnico
             WHERE idTecnico=:idTecnico");
             $sentencia->bindParam(':fotoTecnico',$nombreArchivo);
             $sentencia->bindParam(':idTecnico',$txtID);
             $sentencia->execute();
        }


        header('Location: indix.php');

            echo $txtID;
            echo"presionaste btn Modificar";
            break;

            case"btnEliminar":

            $sentencia=$pdo->prepare("SELECT fotoTecnico FROM tecnicoss
            WHERE idTecnico=:idTecnico"); 
            $sentencia->bindParam(':idTecnico',$txtID);
            $sentencia->execute();
            $tecnicoss=$sentencia->fetch(PDO::FETCH_LAZY);

                print_r($tecnicoss);

                if(isset($tecnicoss["fotoTecnico"])&&($item['fotoTecnico']!="imagen.jpg")){
                    if(file_exists("../Source/img/".$tecnicoss["fotoTecnico"])){
                        unlink("../Source/img/".$tecnicoss["fotoTecnico"]);
                    }
                }
            
            $sentencia=$pdo->prepare("DELETE FROM tecnicoss
            WHERE idTecnico=:idTecnico"); 
            $sentencia->bindParam(':idTecnico',$txtID);
            $sentencia->execute();
            header('Location: indix.php');
            

                echo"presionaste btn Eliminar";
                break;

                case"btnCancelar":
                    echo"presionaste btn Cancelar";
                    header('Location: indix.php');
                    break;
                    
                    case "Seleccionar":
                        echo"presionaste btn seleccionar";
                        $accionAgregar="disabled";
                        $accionModificar=$accionEliminar=$accionCancelar="";
                        $mostrarModal=true;

                        $sentencia=$pdo->prepare("SELECT fotoTecnico FROM tecnicoss
                        WHERE idTecnico=:idTecnico"); 
                        $sentencia->bindParam(':idTecnico',$txtID);
                        $sentencia->execute();
                        $tecnicoss=$sentencia->fetch(PDO::FETCH_LAZY);

                        *
                        $txtNombre=$tecnicoss['Nombre'];
                        $txtApellidoP=$tecnicoss['ApellidoP'];
                        $txtApellidoM=$tecnicoss['ApellidoM'];
                        $txtCorreo=$tecnicoss['Correo'];
                        $txtDepartamento=$tecnicoss['Departamento'];
                        $txtFoto=$tecnicoss['Foto'];

                        *

                        break;
}

$sentencia=$pdo->prepare("SELECT * FROM `tecnicoss` WHERE 1");
$sentencia->execute();
$listaTecnicos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//print_r($listaTecnicos);

?>
<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD TECNICOS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootsrap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <div class="container">

    <!--Formulario-->
<form action="" method="post" enctype="multipart/form-data">

       

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tecnico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
                <input type="hidden"  name="txtID" required value="<?php echo $txtID;?>" placeholder="" id="txtID" require="">
                    
                        <div class="form-group col-md-12">
                            <label for="">Nombre(s):</label>
                            <input type="text" class="form-control"  name="txtNombre" required value="<?php echo $txtNombre;?>"placeholder="" id="txtNombre" require="">
                            <br>
                        </div>

                            <div class="form-group col-md-12">
                                <label for="">Apellido Paterno:</label>
                                <input type="text" class="form-control"  name="txtApellidoP" required value="<?php echo $txtApellidoP;?>"placeholder="" id="txtApellidoP" require="">
                                <br>
                            </div>

                                    <div class="form-group col-md-12">
                                        <label for="">Apellido Materno:</label>
                                        <input type="text" class="form-control"  name="txtApellidoM" required value="<?php echo $txtApellidoM;?>"placeholder="" id="txtApellidoM" require="">
                                        <br>
                                    </div>

                                        <div class="form-group col-md-12">
                                            <label for="">Correo Electronico:</label>
                                            <input type="email" class="form-control"   name="txtCorreo" required value="<?php echo $txtCorreo;?>" placeholder="" id="txtCorreo" require="">
                                            <br>
                                        </div>

                                            <div class="form-group col-md-12">
                                                <label for="">Departamento:</label>
                                                <input type="text" class="form-control"  name="txtDepartamento" required value="<?php echo $txtDepartamento;?>"placeholder="" id="txtDepartamento" require="">
                                                <br>
                                            </div>

                                                <div class="form-group col-md-12">
                                                    <label for="">Foto:</label>
                                                    <input type="file"  class="form-control"  accept="image/*" name="txtFoto" required value="<?php echo $txtFoto;?>" placeholder="" id="txtFoto" require="">
                                                    <br>
                                                </div>

            </div>
     
      </div>

      <div class="modal-footer">
            <!--Botones-->

        <button value="btnAgregar"<?php echo $accionAgregar;?> class="btn btn-success" type="submit" name="accion">Agregar</button>
        <button value="btnModificar"<?php echo $accionModificar;?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar"<?php echo $accionEliminar;?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar"<?php echo $accionCancelar;?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
        
        
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Tecnico
</button>
<button type="button" class="btn btn-success">
  Exportar datos
</button>
<a button type="button" class="btn btn-danger" href="../prueba/index.php">
  Salir
</button></a>



</form>



<!-- Tabla for each con los datos de la base de datos-->
<div class="row">

    <table class="table">
        
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre(s)</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
    <?php foreach($listaTecnicos as $tecnicoss){?>

        <tr>
            <td><img class="img-thumbnail" width="100px" src="../Source/img/ <?php  echo $tecnicoss['fotoTecnico']; ?>" /></td>
            <td><?php echo $tecnicoss['nombreTecnico'];?></td>
            <td><?php echo $tecnicoss['apellidoP'];?></td>
            <td><?php echo $tecnicoss['apellidoM'];?></td>
            <td><?php echo $tecnicoss['correoTecnico'];?></td>
            <td><?php echo $tecnicoss['departamento'];?></td>
            <td>
            
            <form action="" method="post">

            <input type="hidden" name="txtID" value="<?php echo $tecnicoss['idTecnico'];?>">
            <input type="hidden" name="txtNombre"value="<?php echo $tecnicoss['nombreTecnico'];?>">
            <input type="hidden" name="txtApellidoP"value="<?php echo $tecnicoss['apellidoP'];?>">
            <input type="hidden" name="txtApellidoM"value="<?php echo $tecnicoss['apellidoM'];?>">
            <input type="hidden" name="txtCorreo"value="<?php echo $tecnicoss['correoTecnico'];?>">
            <input type="hidden" name="txtDepartamento"value="<?php echo $tecnicoss['departamento'];?>">
            <input type="hidden" name="txtFoto"value="<?php echo $tecnicoss['fotoTecnico'];?>";>

            <input  type="submit" value="Seleccionar" class="btn btn-info" name="accion">
            <button value="btnEliminar" type="submit" class="btn btn-danger" name="accion">Eliminar</button>
            </form>

            
            
            </td>
        </tr>

        <?php }?>
    
    </table>

</div>
        <?php if($mostrarModal){?>
        <script>
        $('#exampleModal').modal('show');
        </script>
        <?php }?>
</div>

</body>
</html>
















