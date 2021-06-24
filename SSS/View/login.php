<?php  require "../include/login-banner.php";
session_start();

<<<<<<< HEAD
if (isset($_POST['mail'])){
    session_reset();
    session_unset();

}
?>


                                                                  
<script >

                   const clickSend = document.getElementById("submi");
                    const divLoad =   document.getElementById("circle-load");

clickSend.addEventListener('click', function(e) {
    e.preventDefault();

query();
 
  });


function query()
{
=======
  
    <meta charset="UTF-8">
    <title>Login / Sistema Solicitudes de Servicio</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="icon" type="img/jpg" href="../Source/img/icon.jpg">
    <link rel="stylesheet" href="../Source/icon/log_Style.css">
    <link rel="stylesheet" href="../Source/css/css/log_Style.css">
    
</head>
<body>
>>>>>>> bb692f3e362ba0ed2033027b8e5fefb085df11e9
    
    clickSend.classList.replace("idbutton", "idbutton-no");

    divLoad.classList.replace("vis-circle-no","vis-circle");
    
    $.ajax({
        url: "../Model/validar2.php",
        type:"POST",
        data:$("#form").serialize(),
        timeout:3000,
        error:function(){
                alert("error de tiempo");
        },
        success: function(result) {

            var json = JSON.parse(result);

            if (json.success == true) {
                window.location.assign("../View/cards.php");
        } else {
            clickSend.classList.replace( "idbutton-no","idbutton");
            divLoad.classList.replace("vis-circle","vis-circle-no");
            }

        }     

    });

    document.addEventListener('keydown', function(event) {
    if(event.keyCode == 37) {
        alert('Left was pressed');
    }
    else if(event.keyCode == 39) {
        alert('Right was pressed');
    }
});
  
}

</script>    
         

</body>
</html>