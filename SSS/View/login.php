<!DOCTYPE html>
<html lang="en">
<head>

  
    <meta charset="UTF-8">
    <title>Login / Sistema Solicitudes de Servicio</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="icon" type="img/jpg" href="../Source/img/icon.jpg">
    <link rel="stylesheet" href="../Source/icon/log_Style.css">
    <link rel="stylesheet" href="../Source/css/css/log_Style.css">
    
</head>
<body>
    
<div class="container-form">
        <div class="header">
            <div class="logo-title">
                <img src="../Source/img/logo.jpg" alt="">
                <h2>Cenidet</h2>
            </div>
            <div class="menu">
                
            </div>
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Bienvenido</h1><h2>SSS</h2></div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" class="form-control" placeholder="Correo Electronico" name="mail"id="recipient-name">
            </div>
            
            
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit" class="btn btn-primary">Entrar<label class="lnr lnr-chevron-right"></label></button>
        </form>
    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>