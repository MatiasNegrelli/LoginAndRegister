<?php

    // iniciamos la sesion
    session_start();


    // Verificamos si el usuario está logueado
    if (!isset($_SESSION['usuario'])){
        echo'
        <script>
            alert("Debes iniciar sesión para acceder a esta página");
            window.location = "../index.php";
        </script>;
        ';

        // para que el codigo no se ejecute y la sesion se cierre
        session_destroy();
        die();



    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="../src/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Funnel+Display:wght@300..800&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white font-sans min-h-screen flex flex-col justify-center items-center">
    <div class="bg-gray-800 shadow-lg rounded-lg p-8 max-w-md w-full text-center sm:max-w-lg md:max-w-xl">
        <h1 class="text-4xl font-extrabold text-gray-100 mb-4 sm:text-5xl">¡Bienvenido, <span class="text-gray-400"><?php echo $_SESSION['nombre_usuario']; ?></span>!</h1>

        <p class="text-gray-400 text-lg mb-4 sm:text-xl">Estoy encantado de que estes aquí.</p>

        <p class="text-gray-400 text-md mb-6 sm:text-lg">Próximamente, añadiremos más opciones para mejorar mi portafolio.</p>

        <a href="../php/cerrarSesion.php" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-md transition duration-200 sm:py-3 sm:px-6">Cerrar Sesión</a>
    </div>

    <footer class="mt-8 text-gray-500 text-sm sm:text-base">
        <p>Matias Negrelli</p>
    </footer>
</body>
</html>




