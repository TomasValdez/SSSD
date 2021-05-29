<?php


$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../Conexion/Conexion.php");



switch($accion){
    case"btnAgregar":
        $sentencia=$pdo->prepare("INSERT INTO tecnicos(nombreTecnico,correoTecnico,fotoTecnico) VALUES(:nombreTecnico,:correoTecnico,:fotoTecnico)");
       
        $sentencia->bindParam(':nombreTecnico',$txtNombre);
        $sentencia->bindParam(':correoTecnico',$txtCorreo);

        $Fecha= new DateTime();
        $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";

        $tmpFoto=$_FILES["txtFoto"]["tmp_name"];

        if($tmpFoto!=""){
            move_uploaded_file($tmpFoto,"../Source/img/".$nombreArchivo);
        }


        $sentencia->bindParam(':fotoTecnico',$nombreArchivo);
        $sentencia->execute();

        echo $txtID;
        echo"presionaste bnt agregar";
     break;

        case"btnModificar":

        $sentencia=$pdo->prepare("UPDATE tecnicos 
        SET nombreTecnico=:nombreTecnico,
        correoTecnico=:correoTecnico
         WHERE idTecnico=:idTecnico");
        
       
        $sentencia->bindParam(':nombreTecnico',$txtNombre);
        $sentencia->bindParam(':correoTecnico',$txtCorreo);
        
        $sentencia->bindParam(':idTecnico',$txtID);
        $sentencia->execute();


        $Fecha= new DateTime();
        $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";

        $tmpFoto=$_FILES["txtFoto"]["tmp_name"];

        if($tmpFoto!=""){
            move_uploaded_file($tmpFoto,"../Source/img/".$nombreArchivo);
        

            $sentencia=$pdo->prepare("SELECT fotoTecnico FROM tecnicos
            WHERE idTecnico=:idTecnico"); 
            $sentencia->bindParam(':idTecnico',$txtID);
            $sentencia->execute();
            $tecnicos=$sentencia->fetch(PDO::FETCH_LAZY);

                print_r($tecnicos);

                if(isset($tecnicos["fotoTecnico"])){
                    if(file_exists("../Source/img/".$tecnicos["fotoTecnico"])){
                        unlink("../Source/img/".$tecnicos["fotoTecnico"]);
                    }
                }


            $sentencia=$pdo->prepare("UPDATE tecnicos SET fotoTecnico=:fotoTecnico
             WHERE idTecnico=:idTecnico");
             $sentencia->bindParam(':fotoTecnico',$nombreArchivo);
             $sentencia->bindParam(':idTecnico',$txtID);
             $sentencia->execute();
        }


        header('Location: index.php');

            echo $txtID;
            echo"presionaste btn Modificar";
            break;

            case"btnEliminar":

            $sentencia=$pdo->prepare("SELECT fotoTecnico FROM tecnicos
            WHERE idTecnico=:idTecnico"); 
            $sentencia->bindParam(':idTecnico',$txtID);
            $sentencia->execute();
            $tecnicos=$sentencia->fetch(PDO::FETCH_LAZY);

                print_r($tecnicos);

                if(isset($tecnicos["fotoTecnico"])){
                    if(file_exists("../Source/img/".$tecnicos["fotoTecnico"])){
                        unlink("../Source/img/".$tecnicos["fotoTecnico"]);
                    }
                }
            /*
            $sentencia=$pdo->prepare("DELETE FROM tecnicos
            WHERE idTecnico=:idTecnico"); 
            $sentencia->bindParam(':idTecnico',$txtID);
            $sentencia->execute();
            header('Location: index.php');
            */

                echo"presionaste btn Eliminar";
                break;

                case"btnCancelar":
                    echo"presionaste btn Cancelar";
                    break;

}

$sentencia=$pdo->prepare("SELECT * FROM `tecnicos` WHERE 1");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
   
    <div class="container">

    <!--Formulario-->
<form action="" method="post" enctype="multipart/form-data">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Launch demo modal
        </button>

        <!-- Modal para el usuario -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>


<input type="hidden"  name="txtID" required value="<?php echo $txtID;?>" placeholder="" id="txtID" require="">


<label for="">Nombre(s):</label>
<input type="text"  name="txtNombre" required value="<?php echo $txtNombre;?>"placeholder="" id="txtNombre" require="">
<br>

<label for="">Correo Electronico:</label>
<input type="email"  name="txtCorreo" required value="<?php echo $txtCorreo;?>" placeholder="" id="txtCorreo" require="">
<br>

<label for="">Foto:</label>
<input type="file"  accept="image/*" name="txtFoto" required value="<?php echo $txtFoto;?>" placeholder="" id="txtFoto" require="">
<br> 

<!--Botones-->

<button value="btnAgregar" type="submit" name="accion">Agregar</button>
<button value="btnModificar" type="submit" name="accion">Modificar</button>
<button value="btnEliminar" type="submit" name="accion">Eliminar</button>
<button value="btnCancelar" type="submit" name="accion">Cancelar</button>
</form>

<!-- Tabla for each con los datos de la base de datos-->
<div class="row">

    <table class="table">
        
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
    <?php foreach($listaTecnicos as $tecnicos){?>

        <tr>
            <td><img class="img-thumbnail" width="100px" src="../Source/img/ <?php  echo $tecnicos['fotoTecnico']; ?>" /></td>
            <td><?php echo $tecnicos['nombreTecnico'];?></td>
            <td><?php echo $tecnicos['correoTecnico'];?></td>
            <td>
            
            <form action="" method="post">

            <input type="hidden" name="txtID" value="<?php echo $tecnicos['idTecnico'];?>">
            <input type="hidden" name="txtNombre"value="<?php echo $tecnicos['nombreTecnico'];?>">
            <input type="hidden" name="txtCorreo"value="<?php echo $tecnicos['correoTecnico'];?>">
            <input type="hidden" name="txtFoto"value="<?php echo $tecnicos['fotoTecnico'];?>";>

            <input  type="submit" value="Seleccionar" name="accion">
            <button value="btnEliminar" type="submit" name="accion">Eliminar</button>
            </form>

            
            
            </td>
        </tr>

        <?php }?>
    
    </table>

</div>
</div>

</body>
</html>
















