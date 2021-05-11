<?php 


    session_start();

    if (isset($_SESSION['mail'])) {
        session_reset();
    }

    require "../include/login-banner.php";
    
?>


                                                                  
<script >
                    const clickSend = document.getElementById("submi");
                    const divLoad =   document.getElementById("circle-load");

    clickSend.addEventListener('click', function(e) {
    e.preventDefault();
  
    clickSend.classList.replace("idbutton", "idbutton-no");

    divLoad.classList.replace("vis-circle-no","vis-circle");
    

    $.ajax({
        url: "../Model/validar2.php",
        type:"POST",
        data:$("#form").serialize(),
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
  });
</script>    
                        
</body>
</html>