const bmail = document.getElementById("btn-mail");
const divm = document.getElementById("flexclass");
const textmail = document.getElementById("input-mail");

// @cenidet.tecnm.mx
//var expresion="[az]@cenidet.tecnm.mx";
bmail.addEventListener("click", (e) =>
    mail()
);



function mail() {

    if (textmail.value !== "") {
        divm.classList.remove("flex-item");
        divm.classList.add("flex-v");

    } else {

    }
}