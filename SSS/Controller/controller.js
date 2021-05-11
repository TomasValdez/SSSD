tpo = ["EQUIPO DE COMPUTO", "IMPRESORA",
    "INTERNET", "SITIO WEB", "SII", "OTRO"
];
let otro;
const b1 = document.getElementById("b1");
const b2 = document.getElementById("b2");
const b3 = document.getElementById("b3");
const b4 = document.getElementById("b4");
const b5 = document.getElementById("b5");
const b6 = document.getElementById("b6");

b1.addEventListener("click", function() {
    action(tpo[0]);


});

b2.addEventListener("click", function() {
    action(tpo[1]);

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

    $.ajax({
        url: "../Controller/sendMail.php",
        type: "POST",
        data: { 'solicitud': tpo, "otro": otro },
        success: function(result) {

            var json = JSON.stringify(result);
            let boo = json.includes("true");
            window.history.back();

        }
    });

}