var tamañoVentana = window.innerWidth;

if(tamañoVentana > 768) {
    document.getElementById("btnRegister").addEventListener("click", register);
    document.getElementById("btnLogin").addEventListener("click", login);
    
}



// variables necesarias
var contenedorLoginRegister = document.querySelector(".contenedorLoginRegister");
var formularioLogin = document.querySelector(".formularioLogin");
var formularioRegister = document.querySelector(".formularioRegister")

var cajaTraseraLogin = document.querySelector(".cajaTraseraLogin")
var cajaTraseraRegister = document.querySelector(".cajaTraseraRegister")




function register() {
    const tamañoVentana = window.innerWidth;
    
    if (tamañoVentana >= 1620) {
        contenedorLoginRegister.style.left = "780px";
    }
    else if (tamañoVentana >= 1400) {
        contenedorLoginRegister.style.left = "700px";
    }
    else if (tamañoVentana >= 1390) {
        contenedorLoginRegister.style.left = "660px";
    }else if (tamañoVentana >= 1280) {
        contenedorLoginRegister.style.left = "580px";
    } else if (tamañoVentana > 1180) {
        contenedorLoginRegister.style.left = "490px";
    } else if (tamañoVentana > 1100) {
        contenedorLoginRegister.style.left = "470px";
    } else if (tamañoVentana >= 1024) {
        contenedorLoginRegister.style.left = "448px";
    }

    cajaTraseraRegister.style.opacity = "0"; // Mostrar gradualmente
    cajaTraseraLogin.style.opacity = "1"; // Ocultar gradualmente
    formularioRegister.style.display = "block";
    formularioLogin.style.display = "none";
}

function login() {
    const tamañoVentana = window.innerWidth;

    if (tamañoVentana >= 768) {
        contenedorLoginRegister.style.left = "96px";
    }

    cajaTraseraRegister.style.opacity = "1"; // Ocultar gradualmente
    cajaTraseraLogin.style.opacity = "0"; // Mostrar gradualmente
    formularioRegister.style.display = "none";
    formularioLogin.style.display = "block";
}

