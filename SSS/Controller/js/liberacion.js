var idButton = document.getElementById("liberar_button");
var idc = document.getElementById("calificacion");
idButton.addEventListener("click", function() {
    var calSelect = idc.options[idc.selectedIndex].value; //extraer el id del tecnico

    var comentario = document.getElementById("comentario").value;


    $.ajax({
        url: "../Controller/Liber.php",
        type: "POST",
        data: { "calificacion": calSelect, "comentario": comentario.trim() },
        success: function(result) {
            console.log(result);
            var json = JSON.parse(result);

            if (json.estado == 0) {
                alert("Lberado exitosamente");
            } else if (json.estado == 1) {


                alert("ya fue liberado ");
            } else
            if (json.estado == 2) {

                alert("No se activado la solicitud");
            }
        }
    });

});