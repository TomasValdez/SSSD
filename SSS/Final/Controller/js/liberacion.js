
var idButton = document.getElementById("liberar_button");
var idc = document.getElementById("calificacion");
var div_lib = document.getElementById("div-liberacion");



function antesEnvio(){
 calSelect = idc.options[idc.selectedIndex].value; //extraer el id del tecnico
     comentario = document.getElementById("comentario").value;
    div_lib.classList.replace("content","content-no");
}

function despuesEnvio(){
    text_mensaje=document.getElementById("menssage-status");
    var content_status = document.getElementById("content-status_liberacion");
     img_status = document.getElementById("img-status");

     content_status.classList.replace("content-liberacion-no","content-liberacion");
}

idButton.addEventListener("click", function() {
    antesEnvio();
    
    $.ajax({
        url: "../Controller/Liberacion_Registro.php",
        type: "POST",
        data: { "calificacion": calSelect, "comentario": comentario.trim() },
        success: function(result) {
            console.log(result);
            despuesEnvio();
            var json = JSON.parse(result);

            if (json.estado == 0) {
                text_mensaje.innerText ="Solicitud Liberado exitosamente";
                img_status.setAttribute("src","../Source/img/status-ok.png");

            } else if (json.estado == 1) {
                text_mensaje.innerText ="La solitud ya fue liberado ";
                img_status.setAttribute("src","../Source/img/precaucion.png");

            } else
            if (json.estado == 2) {
                img_status.setAttribute("src","../Source/img/status-error.png");
                text_mensaje.innerText = "No se activado la solicitud";
            } else
            if (json.estado == 3) {
                img_status.setAttribute("src","../Source/img/mail-error.webp");
                text_mensaje.innerText = "Correo no reconocido";
            }
            if (json.estado == 4) {
                img_status.setAttribute("src","../Source/img/precaucion.png");
                text_mensaje.innerText = "Solicitud Sin Asignacion";
            }
        }
    });

});

