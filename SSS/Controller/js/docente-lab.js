var mailsend = document.querySelectorAll(".mail");
const idmail = document.getElementById("idmail-no");
const logout = document.getElementById("logout");

/*Click para cerrar session */
logout.addEventListener("click", function(e) {
    e.preventDefault();

    $.ajax({
        url: "../Model/loginout.php",
        type: "POST",
        async: true,
        timeout: 1 * 60 * 60 * 100,
        success: (function(result) {

            window.history.back(-1);

        })
    });

});


function sendmail(e) {

    const fila = e.target.parentNode.parentNode;
    mail = fila.children[1].innerHTML;


    $.ajax({
        url: "../Controller/controllerMail.php",
        type: "POST",
        data: { mail: mail },
        async: true,
        timeout: 1 * 60 * 60 * 100,
        success: (function(result) {
            let va = JSON.stringify(result);

            if (va.includes("true")) {
                //correcto
            }
        }),
        error: function(jqXHR, textStatus, errorThrown) {

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
    mailsend[i].addEventListener('click', function(e) {
        e.preventDefault();
        sendmail(e);

    });
}