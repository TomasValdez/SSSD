<!DOCTYPE html>

<html>
    
<link rel="stylesheet" href="../Source/css/index.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   
<head>
    <title></title>
</head>
<body>
    <script src="../Controller/jquey.js"></script>
<?php include "../include/banner_tenc.php";
//include "../include/loadMail.php";
?>

<div class="docen-index">
<header>
<div class="line-menu"></div>
    <div class="menu-div">
    <button id="logout">Cerrar session</button>
    </div>
</header>

<div >BIENVENIDO <?PHP 
    session_start();
    echo $_SESSION['nombre']; ?></div>
<table id="table" class="table table-striped">
    <tbody>
        <th>#</th>
        <th>Solicitante</th>
     
        <th>Técnico</th>
        
    </tbody>

    <?php
 if ($Ctecnico=isset($_SESSION['mailt'])){
        include '../Model/conecct.php';
        $con=new Connection_db();
        $sql=$con->conexion();
        
    $exe=$sql->prepare("SELECT idRegistro,CorreoSolic AS mail FROM 
    registro 
    where Activacion=1 and statusS='Asignado' and 
    idtecnico in (select tec.idtecnico from tecnico tec where  tec.Correo='{$_SESSION['mailt']}') " );
    $exe->execute();
    $resul=$exe->fetchAll();
foreach ($resul as $key=> $fila){
//    while($fila=mysqli_fetch_assoc($resul)){
       
      echo "<tr>
        <td>{$fila[0]}</td>
        <td>{$fila[1]}</td>
        <td>Asignado</td>
     <td><a id=\"mail\" class=\"mail\">Enviar correo</a></td></tr>";
     
     /*<td><form method=\"post\" action=\"../Controller/sendMailL.php\">
        <input type=\"hidden\" name=\"mail\"value=\"{$fila[1]}\">
        <input type=\"submit\" value=\"Enviar MAil\"></input></form></td></tr>";
         */
 
 }


    $sql=null;
    }
    else {
         header("location:../View/LoginTec.php");
    }
?>
    

</table>


</body>
<script >
    var mailsend = document.querySelectorAll(".mail");
    const idmail= document.getElementById("idmail-no");
    const logout= document.getElementById("logout");

/*Click para cerrar session */
logout.addEventListener("click",function(e){
    e.preventDefault();
    
    $.ajax({
        url: "../Model/loginout.php",
        type: "POST",
        async:true,
        timeout:1*60*60*100,
        success: (function (result){
       
          window.history.back(-1);
        
        })
    });

});
 

function deletehab(e){

    const fila = e.target.parentNode.parentNode;
    mail = fila.children[1].innerHTML;
    
    console.log(mail);
           
    $.ajax({
        url: "../Controller/controllerMail.php",
        type: "POST",
        data: {mail: mail},
        async:true,
        timeout:1*60*60*100,
        success: (function (result){
       let va=JSON.stringify(result);
      
        if (va.includes("true")){

            console.log("se envio exitosamente");
        }
        }),
        error :
         function( jqXHR, textStatus, errorThrown ) {
            
            if (jqXHR.status === 0) {

                
                alert('Not connect: Verify Network.');
                
            } else if (jqXHR.status == 404) {

                alert('Requested page not found [404]');
                
            } else if (jqXHR.status == 500) {
                
                alert('Internal Server Error [500].');
                
            } else if (textStatus === 'parsererror') {
                
                alert('Requested JSON parse failed.');
                
            } else if (textStatus === 'timeout') {
                
                alert('Time out error.');

            } else if (textStatus === 'abort') {
                
                alert('Ajax request aborted.');
                
            } else {
                
                alert('Uncaught Error: ' + jqXHR.responseText);
                
            }
            
        }
        
    });
    
}

for (var i = 0; i < mailsend.length; i++) {
    mailsend[i].addEventListener('click', function(e){
    e.preventDefault();
    deletehab(e);

} );
}


 
 </script>
</div>
</html>