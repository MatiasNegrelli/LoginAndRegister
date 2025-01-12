<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        header('Location: pages/welcome.php');
        exit();
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <link href="./src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Funnel+Display:wght@300..800&display=swap" rel="stylesheet">

    
</head>
<body >
    <main class="w-full px-20 m-auto mt-100px max-lg:px-10 ">

        <div class="contenedorTodo text-white mt-10 w-full max-w-screen-2xl m-auto relative ">
            <div class="cajaTrasera w-full pl-3 pr-5 flex justify-center bg-cyan-700 backdrop-blur-md bg-opacity-40 h-96 max-lg:flex-col max-lg:pt-2 max-lg:h-full ">
                <div class="cajaTraseraLogin my-24 mx-10 text-white  duration-500 max-xl:mr-10 max-lg:my-3 ">
                    <h3 class="font-medium text-2xl max-lg:text-xl">Ya tienes cuenta?</h3>
                    <p class="mb-4 max-lg:text-sm">Inicia sesion para ingresar a la web</p>
                    <button id="btnLogin" class="max-lg:text-sm p-3 border-solid border-white border-2 text-black bg-white text opacity-70 rounded-2xl font-semibold cursor-pointer duration-300 hover:bg-gray-400 ">Iniciar Sesion</button>
                </div>
                <div class="cajaTraseraRegister my-24 mx-10 text-white duration-500 max-lg:my-7">
                    <h3 class="font-medium text-2xl max-lg:text-xl">No tienes cuenta?</h3>
                    <p class="mb-4 max-lg:text-sm">Registrate para poder inicar sesion</p>
                    <button id="btnRegister" class="max-lg:text-sm p-3 border-solid border-neutral-800 border-2 text-black bg-white text opacity-70 rounded-2xl font-semibold cursor-pointer duration-300 hover:bg-gray-400"  type="submit">Registrarse</button>
                </div>
            </div>

            <div class="contenedorLoginRegister flex items-center w-5/12 relative left-24 max-lg:hidden">
                <form action="php/loginUsuario.php" method="POST" class="formularioLogin w-full py-20 px-5 bg-white absolute rounded-2xl bottom-3">
                    <h2 class="text-2xl text-slate-800 mb-7">Iniciar Sesion</h2>
                    <input class="mt-2 flex text-black" type="text" placeholder="Correo Electronico" name="correoElectronico">
                    <input class="mt-2 flex text-black" type="password" placeholder="Contraseña" name="contrasena">
                    <button class="mt-2  p-3 border-solid border-neutral-500 border-2 text-black bg-white text opacity-80 rounded-2xl font-semibold cursor-pointer duration-300 hover:bg-gray-400" type="submit">Iniciar Sesion</button>
                </form>

                <form action="php/registroUsuario.php" method="POST" class="formularioRegister w-full py-10 px-5 bg-white absolute rounded-2xl bottom-2 hidden max-lg:hidden">
                    <h2 class="text-2xl text-slate-800 mb-7">Registrarse</h2>
                    <input class="mt-2 flex text-black" type="text" placeholder="Nombre Completo" name="nombreCompleto">
                    <input class="mt-2 flex text-black" type="text" placeholder="Correo Electronico" name="correoElectronico">
                    <input class="mt-2 flex text-black" type="text" placeholder="Usuario" name="usuario">
                    <input class="mt-2 flex text-black" type="password" placeholder="Contraseña" name="contrasena">

                    <button id="btnRegister2" class="mt-2  p-3 border-solid border-neutral-500 border-2 text-black bg-white text opacity-80 rounded-2xl font-semibold cursor-pointer duration-300 hover:bg-gray-400">Registrarse</button>
                </form>
            </div>

            <div class=" contenedorResponsive lg:hidden flex justify-center bg-white backdrop-blur-md bg-opacity-50 h-56 mt-2 absolute w-full top-48 rounded-xl">
                <form action="php/loginUsuario.php" method="POST" class="flex-col items-center mt-1 hidden formularioLoginResponsive">
                    <h2 class="p-2 text-2xl text-black">Iniciar Sesion</h2>
                    <input type="text" placeholder="Correo Electronico" class=" text-black mb-4 h-6 w-full placeholder-neutral-900 text-xs" name="correoElectronico">
                    <input type="password" placeholder="Contraseña" class="text-black mb-2 h-6 w-full placeholder-neutral-900 text-xs" name="contrasena">
                    <button id="btnLoginResposive" type="submit" class="mt-2  p-2 border-solid border-neutral-500 border-2 text-black bg-white text opacity-80 rounded-2xl font-semibold cursor-pointer duration-300 hover:bg-gray-400">Iniciar Sesion</button>
                </form>

                <form action="php/registroUsuario.php" method="POST" class="flex flex-col items-center mt-1 formularioRegisterResponsive ">
                    <h2 class="p-2 text-2xl text-black">Registrarse</h2>
                    <input type="text" placeholder="Nombre Completo" class="text-black mb-2 h-6 w-full placeholder-neutral-900 text-xs" name="nombreCompleto">
                    <input type="text" placeholder="Correo Electronico" class="text-black mb-2 h-6 w-full placeholder-neutral-900 text-xs"  name="correoElectronico">
                    <input type="text" placeholder="Usuario" class="text-black mb-2 h-6 w-full placeholder-neutral-900 text-xs" name="usuario">
                    <input type="password" placeholder="Contraseña" class="text-black mb-2 h-6 w-full placeholder-neutral-900 text-xs" name="contrasena">
                    <button id="btnRegisterResposive" class="p-2 border-solid border-neutral-500 border-2 text-black bg-white text opacity-80 rounded-2xl font-semibold cursor-pointer duration-300 hover:bg-gray-400 text-sm">Iniciar Sesion</button>
                </form>
            </div>
        

        </div>

    </main>
    <script src="./javaScript/script.js"></script>
    <script src="./javaScript/scriptResponsive.js"></script>
</body>
</html>