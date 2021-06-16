
<?php
require'Tecnicos.php';
?>

<!DOCTYPE html>
<html lang="en">
    
<body>
<head>


    <header>
    <div class="logo-head">
        <div class="logo-item">
                    <a href="https://cenidet.tecnm.mx/">  
                    <img src="../Source/img/Logo_CENIDET (1).png" class="img-logo"></a>
            
            </div>
        <div class="logo-item">
                    <img src="../Source/img/tecnm.png" class="img-logo2">
            </div>
        
            <div class="logo-item"><h2> TECNOLOGICO NACIONAL DE MEXICO</h2>
            
            </div>
    </div>

    </header>

    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD TECNICOS</title>
    <link rel="stylesheet" href="banner.css">
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
                            <input type="text" class="form-control <?php echo (isset($error['Nombre']))?"is-invalid":"";?>" name="txtNombre" required value="<?php echo $txtNombre;?>"placeholder="" id="txtNombre" require="">
                            <div class="invalid-feedback">
                            <?php echo (isset($error['Nombre']))?"is-invalid":"";?>
                            </div>
                            <br>
                        </div>

                            <div class="form-group col-md-12">
                                <label for="">Apellido Paterno:</label>
                                <input type="text" class="form-control <?php echo (isset($error['ApellidoP']))?"is-invalid":"";?>" name="txtApellidoP"required value="<?php echo $txtApellidoP;?>"  name="txtApellidoP"  value="<?php echo $txtApellidoP;?>"placeholder="" id="txtApellidoP" require="">
                                <div class="invalid-feedback">
                                <?php echo (isset($error['ApellidoP']))?"is-invalid":"";?>
                                </div>
                                <br>
                            </div>

                                    <div class="form-group col-md-12">
                                        <label for="">Apellido Materno:</label>
                                        <input type="text" class="form-control <?php echo (isset($error['ApellidoM']))?"is-invalid":"";?>"  name="txtApellidoM" required value="<?php echo $txtApellidoM;?>"placeholder="" id="txtApellidoM" require="">
                                        <div class="invalid-feedback">
                                        <?php echo (isset($error['ApellidoM']))?"is-invalid":"";?>
                                        </div>
                                        <br>
                                    </div>
                    
                                        <div class="form-group col-md-12">
                                            <label for="">Correo Electronico:</label>
                                            <input type="email" class="form-control <?php echo (isset($error['Correo']))?"is-invalid":"";?>"   name="txtCorreo"  required value="<?php echo $txtCorreo;?>" placeholder="" id="txtCorreo" require="">
                                            <div class="invalid-feedback">
                                            <?php echo (isset($error['Correo']))?"is-invalid":"";?>
                                            </div>
                                            <br>
                                        </div>

                                            <div class="form-group col-md-12">
                                                <label for="">Departamento:</label>
                                                <input type="text" class="form-control <?php echo (isset($error['Departamento']))?"is-invalid":"";?>"  name="txtDepartamento" required value="<?php echo $txtDepartamento;?>"placeholder="" id="txtDepartamento" require="">
                                                <div class="invalid-feedback">
                                                <?php echo (isset($error['Departamento']))?"is-invalid":"";?>
                                                </div>
                                                <br>
                                            </div>

                                                <div class="form-group col-md-12">
                                                    <label for="">Foto:</label>
                                                    <?php if($txtFoto!=""){?>
                                                    <br/>
                                                    <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../Source/img/<?php echo $txtFoto;?>"/>
                                                    
                                                    <br/>
                                                    <?php }?>
                                                   


                                                    <input type="file"  class="form-control"  accept="image/*" name="txtFoto" value="<?php echo $txtFoto;?>" placeholder="" id="txtFoto" require="">
                                                    <br>
                                                </div>

            </div>
     
      </div>

      <div class="modal-footer">
            <!--Botones-->

        <button value="btnAgregar"<?php echo $accionAgregar;?> class="btn btn-success" type="submit" name="accion">Agregar</button>
        <button value="btnModificar"<?php echo $accionModificar;?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" onclick="return Confirmar('¿Realmente deseas borrar?');" <?php echo $accionEliminar;?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar"<?php echo $accionCancelar;?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
        
        
      </div>
    </div>
  </div>
</div>
<br/>
<br/>
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
<br>
<br>


</form>



<!-- Tabla for each con los datos de la base de datos-->
<div class="row  table-responsive">

    <table class="table table-primary table-hover table-bordered table-striped">
        
        <thead class="table-dark">
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
            <button value="btnEliminar" onclick="return Confirmar('¿Realmente deseas borrar?');" type="submit" class="btn btn-danger" name="accion">Eliminar</button>
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
            
            <script>
            function Confirmar(Mensaje){
                return (confirm(Mensaje))?true:false;
            }
            </script>
</div>

</body>
</html>
















