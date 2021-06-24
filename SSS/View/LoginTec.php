
<<<<<<< HEAD
<?php require "../include/login-banner.php";?>

<script >

    const clickSend = document.getElementById("submi");
                    const divLoad =   document.getElementById("circle-load");
clickSend.addEventListener('click', function(e) {
    e.preventDefault();
      
    clickSend.classList.replace("idbutton", "idbutton-no");

    divLoad.classList.replace("vis-circle-no","vis-circle");
=======
  
    <meta charset="UTF-8">
    <title>Login / Sistema Solicitudes de Servicio</title>
    <link rel="icon" type="img/jpg" href="../Source/img/icon.jpg">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="../Source/css/login.css">
>>>>>>> bb692f3e362ba0ed2033027b8e5fefb085df11e9
    

    $.ajax({
        url: "../Model/validarTec2.php",
        type:"POST",
        data:$("#form").serialize(),
        success: function(result) {
            
            var json = JSON.parse(result);
                console.log();
            if (json.success == true) {
               // alert( "Correo localizado");
                window.location.assign("../View/Docente-Lab.php");
            } else {
                
                clickSend.classList.replace( "idbutton-no","idbutton");
             divLoad.classList.replace("vis-circle","vis-circle-no");
            
            }
            
        }        
        
    });
});

</script>
</body>
</html>