var tamañoVentana = window.innerWidth;

if(tamañoVentana < 1024) {
    document.getElementById("btnLogin").addEventListener("click", loginResponsive);
    document.getElementById("btnRegister").addEventListener("click", registerResponsive);
}

// Declaracion de variables
var cajaTraseraLogin = document.querySelector(".cajaTraseraLogin")
var cajaTraseraRegister = document.querySelector(".cajaTraseraRegister")

var contenedorResponsive = document.querySelector(".contenedorResponsive");

var formularioLoginResponsive = document.querySelector(".formularioLoginResponsive");
var formularioRegisterResponsive = document.querySelector(".formularioRegisterResponsive");


function loginResponsive() {
        formularioRegisterResponsive.style.display = "none";
        formularioLoginResponsive.style.display = "flex";
        contenedorResponsive.style.top = "-25px";
        cajaTraseraRegister.style.opacity = "1";
        cajaTraseraLogin.style.opacity = "0";
    }


function registerResponsive() {
        formularioRegisterResponsive.style.display = "flex";
        formularioLoginResponsive.style.display = "none";
        contenedorResponsive.style.top = "208px";
        cajaTraseraRegister.style.opacity = "0";
        cajaTraseraLogin.style.opacity = "1";
    }
