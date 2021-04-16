<!DOCTYPE html>
<html lang="en">
<head>

  
    <meta charset="UTF-8">
    <title>Login / Sistema Solicitudes de Servicio</title>
    <link rel="icon" type="img/jpg" href="../Source/img/icon.jpg">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="../Source/css/login.css">
    
</head>
<body>
    <div class="log-main">
        <div class="container-form">

            <div class="item">
            <div class="logo-tecn">
                
            </div>
            
            
            </div>

                    <div class="item"> 
                        <div class="header_mail"> INGRESE CORREO</div>

                        <form method="POST" action="../Model/validarTec.php">                        
                        <div class="text-mail"  ><input type="text" name="mail" maxlength="30"></div>
                                
                        <input  type="submit" id="submi" value="ENTRAR">
                        </form>                 
            </div>
        </div>
    </div>

</body>
</html>