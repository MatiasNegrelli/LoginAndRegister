<?php
    // Iniciamos la sesión
    session_start();

    // Importamos el archivo de conexión
    include 'conexionBackend.php';

    // Verificamos si se envió el formulario correctamente
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validamos que los campos estén definidos y no estén vacíos
    $correoElectronico = $_POST['correoElectronico'] ?? null;
    $contrasena = $_POST['contrasena'] ?? null;
    $contrasena = hash('sha512', $contrasena);

    }

    // Verificar que el correo tenga un formato válido
    if (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
        echo '
        <script>
            alert("Por favor, ingrese un correo electrónico válido.");
            window.location = "../index.php";
        </script>';
        exit();
    }



    $validarLogin = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correoElectronico' AND contrasena='$contrasena'");


    if (mysqli_num_rows($validarLogin) > 0) { 
        // Obtener los datos completos del usuario
        $usuarioData = mysqli_fetch_assoc($validarLogin); // Obtiene la fila asociativa desde la consulta
        
        // Guardar datos en la sesión
        $_SESSION['usuario'] = $correoElectronico; // Mantén el correo en la sesión por si lo necesitas
        $_SESSION['nombre_usuario'] = $usuarioData['usuario']; // Guarda el nombre del usuario en la sesión
    
        // Redirigir a la página de bienvenida
        header("Location: ../pages/welcome.php");
        exit();
    }
    


?>