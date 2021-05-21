<?php


$txtID=(isset($_POST['txtID'])?$_POST['txtID']:"");
$txtNombre=(isset($_POST['txtNombre'])?$_POST['txtNombre']:"");
$txtCorreo=(isset($_POST['txtCorreo'])?$_POST['txtCorreo']:"");
$txtFoto=(isset($_POST['txtFoto'])?$_POST['txtFoto']:"");
$accion=(isset($_POST['accion'])?$_POST['accion']:"");

switch($accion){
    case"btnAgregar":
        echo $txtID;
         echo"presionaste btn presionar";
        break;

        case"btnModificar":
            echo"presionaste btn Modificar";
            break;

            case"btnEliminar":
                echo"presionaste btn Eliminar";
                break;

                case"btnCancelar":
                    echo"presionaste btn Cancelar";
                    break;

}

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
<form action="" method="post" ectype="multipart/form-data">

<label for="">ID</label>
<input type="text" name="txtID" placeholder="" id="txtID" require="">
<br>

<label for="">Nombre(s):</label>
<input type="text" name="txtNombre" placeholder="" id="txtNombre" require="">
<br>

<label for="">Correo Electronico:</label>
<input type="text" name="txtCorreo" placeholder="" id="txtCorreo" require="">
<br>

<label for="">Foto:</label>
<input type="text" name="txtFoto" placeholder="" id="txtFoto" require="">
<br>


<button value="btnAgregar" type="submit" name="accion">Agregar</button>
<button value="btnModificar" type="submit" name="accion">Modificar</button>
<button value="btnEliminar" type="submit" name="accion">Eliminar</button>
<button value="btnCancelar" type="submit" name="accion">Cancelar</button>
</form>
</div>

</body>
</html>
















