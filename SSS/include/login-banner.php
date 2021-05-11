<!DOCTYPE html>
<html lang="en">
<head>

  
    <meta charset="UTF-8">
    <title>Login / Sistema Solicitudes de Servicio</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="../Source/css/login.css">
    
    <link rel="stylesheet" href="../Source/css/circleLoad.css">
    
</head>
<body>
<script src="../Controller/jquey.js"></script>

    <div class="log-main">
        <div class="container-form">

            <div class="item">
            <div class="logo-tecn"></div>
            </div>

           
                    <div class="item"> 
                        <div class="header_mail"> INGRESE CORREO</div>

                        <form  id="form"
                        enctype="multipart/form-data">                        
                        <div class="text-mail"  ><input type="text" name="mail"></div>
                        <div class="aling-circle vis-circle-no" id="circle-load"> <div class="lds-roller" ><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                        </div> <?php  /*if (isset($_SESSION['error'])) {
                            echo $_SESSION['error']; }*/
                        ?>

                        <input  type="button" id="submi" value="ENTRAR"  class="idbutton">
                        </form>                 
            </div>
        </div>
    </div>      