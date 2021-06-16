<?php


$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidoP=(isset($_POST['txtApellidoP']))?$_POST['txtApellidoP']:"";
$txtApellidoM=(isset($_POST['txtApellidoM']))?$_POST['txtApellidoM']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtDepartamento=(isset($_POST['txtDepartamento']))?$_POST['txtDepartamento']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$erro=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;
 
include("../Conexion/Conexion.php");



switch($accion){
    case"btnAgregar":

        /*
        if($txtNombre=="" ){
            $error['Nombre']="Escribe el nombre";

        }
        if($txtApellidoP==""){
            $error['ApellidoP']="Escribe el apellido paterno";

        }
        if($txtApellidoM==""){
            $error['ApellidoM']="Escribe el apellido materno";

        }
        if(!filter_var($txtCorreo, FILTER_VALIDATE_EMAIL)){
            $error['Correo']="Escribe el correo";

        }
        if($txtDepartamento==""){
            $error['Departamento']="Escribe el departamento";

        }
        if(count($error)>0){
            $mostrarModal=true;
           
        }
        */
            
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

                if(isset($tecnicoss["fotoTecnico"])&&($tecnicoss['fotoTecnico']!="imagen.jpg")){
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

                      
                       /* $txtNombre=$tecnicoss['Nombre'];
                       // $txtApellidoP=$tecnicoss['ApellidoP'];
                      //  $txtApellidoM=$tecnicoss['ApellidoM'];
                       // $txtCorreo=$tecnicoss['Correo'];
                       // $txtDepartamento=$tecnicoss['Departamento'];
                        $txtFoto=$tecnicoss['Foto'];
                        */
                        

                        break;
}

$sentencia=$pdo->prepare("SELECT * FROM `tecnicoss` WHERE 1");
$sentencia->execute();
$listaTecnicos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//print_r($listaTecnicos);

?>