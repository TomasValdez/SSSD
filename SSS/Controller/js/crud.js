var idt = document.getElementById("tecn");

idt.onchange = function(e) {
    var idSelect = idt.options[idt.selectedIndex].value; //extraer el id del tecnico
    updatable(idSelect);
};


function updatable(idT, e) {

    $.ajax({
        url: "../Model/Crud.php",
        type: "POST",
        data: { idT: idT, method: 3 },
        async: true,
        timeout: 1 * 60 * 60 * 100,
        success: (function(result) {

            if (result == "error") {
                //  $("#table").innerHTNL("<tr><td>Error</td></tr>");
                let erro = (" <tr  id=\"error\">  <td> Se No secontro Informacion </td></tr> ");
                childelement(erro);
            } else {
                var list = JSON.parse(result);
                var info = "";

                for (var z = 0; z < list.length; z++) {
                    info = info + "<tr><td>" +
                        list[z].Departamento + "</td><td>" +
                        list[z].Habilidad + "</td><td>" +
                        list[z].Prioridad + "</td>" +
                        "<td><a>Editar</a><a class=\"BorrarHabil\">Borrar</a>" +
                        "</td></tr>";
                }
                childelement(info);
                bntDelete();
            }

        }),
    });

}


function childelement(infor) {
    var bodyt = document.getElementById("bodt");

    var cout = bodyt.childElementCount;

    if (bodyt.hasChildNodes) {
        for (let i = 0; i < cout; i++) {


            bodyt.children[i].remove();
        }

        bodyt.insertAdjacentHTML("afterbegin", infor);

    } else {
        bodyt.insertAdjacentHTML("beforebegin", infor);

    }
}


/* botones de mesaje de alerta para añadir habiliad */

const openmessage = document.querySelector(".open-message-add"); //boton para abrir mensaje
const divMesssage = document.getElementById("emerger-add");


openmessage.addEventListener("click", function(e) {
    divMesssage.classList.replace("emerger-add", "emerger-add-v");
});


const divExit = document.getElementById("btn-exit");
divExit.addEventListener("click", function() {

    divMesssage.classList.replace("emerger-add-v", "emerger-add");

});


/*Button delete kill */

function bntDelete(e) {
    var btnDelete = document.querySelectorAll(".BorrarHabil");
    for (var i = 0; i < btnDelete.length; i++) {

        btnDelete[i].addEventListener("click", function(e) {
            var idSelect = idt.options[idt.selectedIndex].value; //extraer el id del tecnico

            const fila = e.target.parentNode.parentNode;
            var Departamento = fila.children[0].innerHTML;
            var habilidad = fila.children[1].innerHTML;
            var prioridad = fila.children[2].innerHTML;


            $.ajax({
                url: "../Model/Crud.php",
                type: "POST",
                data: { idT: idSelect, Departamento: Departamento, Habilidad: habilidad, prioridad: prioridad, method: 2 },
                async: true,
                timeout: 1 * 60 * 60 * 100,
                success: (function(result) {
                    var res = JSON.parse(result);

                    if (result == "error") {


                    } else if (res.success == true) {
                        e.target.parentNode.parentNode.remove();

                    }

                })
            });



        });

    }
}