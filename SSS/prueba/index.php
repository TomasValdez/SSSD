<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

<link rel="stylesheet" href="normalize.css">
<link rel="stylesheet" href="index.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootsrap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<head><title>index</title></head>
<?php
require'../Tecnicos/crud_login.php';

?>
<body>
    <div class="main-windows"> 
    <header>
    <div class="logo-head">
        <div class="logo-item">
                    <a data-bs-toggle="modal" href="#exampleModalToggle" role="button">  
                    <img src="../Source/img/Logo.png" class="img-logo"></a>
            
            </div>
        <div class="logo-item">
                    <img src="../Source/img/tecnm.png" class="img-logo2">
            </div>
        
            <div class="logo-item"><h2> TECNOLOGICO NACIONAL DE MEXICO</h2>
            
            </div>
    </div>
    </header>
<div class="content-reparation">
    
<div class="line-menu">
   <div class="menu-div">
          <a href="Login.php" >Registrar Solicitud</a>
     
      <!-- 
       
       
       <a href="Loginadmin.php" >Admin</a>
       <a href="LoginTec.php">Docente de Computo</a>
       -->
       <a href="Bitacora.php">Bitacora de Solicitud</a>
       
   </div>
</div>
<div class="logo-reparacion">
<img src="../Source/img/servicio.png" class="img-servicio">
</div>

</div>
</div>
</body>
</html>
