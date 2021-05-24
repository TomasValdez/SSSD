<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Source/css/normalize.css">

    <link rel="stylesheet" href="../Source/css/login2.css">
    
    <link rel="stylesheet" href="../Source/css/circleLoad.css">
    <title>Login-Admin</title>
</head>
<body>
<div class="log-main">
        <div class="container-form">

            <div class="item">
            <div class="logo-tecn"></div>
            </div>

           
                    <div class="item"> 
                        <div class="header_mail"> Bienvenido</div>

                        <form  id="form"
                        enctype="multipart/form-data" utocomplete="off">                        
                        <div class="text-mail2"  ><input type="text" name="mail" placeholder="Ingrese Correo"></div>
                        <div class="text-pass"  ><input type="password" name="pass" placeholder="Contraseña"></div>
                        <div class="aling-circle vis-circle-no" id="circle-load"> <div class="lds-roller" ><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                        </div>

                        <input  type="button" id="submi" value="ENTRAR"  class="idbutton">
                        </form>                 
            </div>
        </div>
    </div>      
    <script src="../Controller/js/Login_admin.js"> 


    </script>

    
</body>
</html>