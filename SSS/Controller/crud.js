 var tableR = document.querySelectorAll(".mailb");
 var id = document.getElementById("idtecnico-List");

 var strUser = id.options[id.selectedIndex].value; //extraer el id del tecnico
 console.log(strUser);

 for (var i = 0; i < tableR.length; i++) {
     tableR[i].addEventListener('click', function(e) {

         e.preventDefault();
         const fila = e.target.parentNode.parentNode;

         dep = fila.children[0].innerHTML;
         habil = fila.children[1].innerHTML;
         Priority = fila.children[2].innerHTML;



         deleteHab(dep, habil, Priority, "delete");

     });


     function deleteHab(dep, habil, Priority, method) {

         $.ajax({
             url: "../Controller/Crud.php",
             type: "POST",
             data: { dep: dep, habil: habil, Priority: Priority, method: method, strUser, strUser },
             async: true,
             timeout: 1 * 60 * 60 * 100,
             success: (function(result) {
                 let va = JSON.stringify(result);
                 console.log(va);
                 if (va) {

                     console.log("Elimnacion Correcta");
                 } else {
                     console.log("Elimnacion InCorrecta");
                 }
             })
         });
     }
 }