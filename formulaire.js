let bopen= document.querySelector("#open");
let bclose= document.querySelector("#close");
let btnreset= document.querySelector("#btnreset");

// function
function afficher() {
    document.querySelector("#popup-content").style.display = "flex";
}

function masquer() {
    document.querySelector("#popup-content").style.display = "none";
}

bopen.addEventListener("click",afficher);
bclose.addEventListener("click",masquer);
btnreset.addEventListener("click",masquer);