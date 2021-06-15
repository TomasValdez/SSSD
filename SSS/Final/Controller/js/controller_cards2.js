tpo = ["EQUIPO DE COMPUTO", "IMPRESORA",
    "INTERNET", "SITIO WEB", "SII", "OTRO"
];




b1.addEventListener("click", function() {
    action(tpo[0]);
});

b2.addEventListener("click", function() {
      action(tpo[1], );

});
b3.addEventListener("click", function() {
    action(tpo[2]);
});
b4.addEventListener("click", function() {
    action(tpo[3]);
});
b5.addEventListener("click", function() {
    action(tpo[4])
});
b6.addEventListener("click", function() {

    action(tpo[5]);
});



function action(tpo) {
    let otro = document.getElementById("text").value;
    sendMAil(1);
    $.ajax({
        url: "../Controller/sendMail.php",
        type: "POST",
        data: { 'solicitud': tpo, "otro": otro },
        success: function(result) {
            
            var json = JSON.parse(result);
            if (json.success == true) {
                window.history.back();                
            }else  if (json.success == false) {
                sendMAil(2);
            }
        },error: function(jqXHR, textStatus, errorThrown) {
            sendMAil(2);
              
        }

    });

}



function sendMAil(Option){
    var cells = document.getElementsByTagName("input");
for (var i = 0; i < cells.length; i++) {
    
    if(cells[i].type ==="button"){
                    
            switch(Option){
                case 1:
                    cells[i].classList.replace("boton_personalizado","not-boton_personalizado");
                break;
                case 2:
                    cells[i].classList.replace("not-boton_personalizado","boton_personalizado");
                break;

            }

    }
}


}