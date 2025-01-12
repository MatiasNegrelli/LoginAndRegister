<?php
// Importamos el archivo de conexión
include 'conexionBackend.php';

// Verificamos si se envió el formulario correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validamos que los campos estén definidos y no estén vacíos
    $nombreCompleto = $_POST['nombreCompleto'] ?? null;
    $correoElectronico = $_POST['correoElectronico'] ?? null;
    $usuario = $_POST['usuario'] ?? null;
    $contrasena = $_POST['contrasena'] ?? null;

    // Verificar que el correo tenga un formato válido
    if (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
        echo '
        <script>
            alert("Por favor, ingrese un correo electrónico válido.");
            window.location = "../index.php";
        </script>';
        exit();
    }


    // verificamos que la contraseña contiene almenos 8 caracteres y una letra 
    if(strlen($contrasena) < 8 || !preg_match('`[a-z]`', $contrasena)){
        echo '
        <script>
            alert("La contraseña debe contener al menos 8 caracteres y una letra");
            window.location = "../index.php";
        </script>';
        exit();
    }




    // Encriptamos la contraseña
    $contrasena = hash('sha512', $contrasena);

    if ($nombreCompleto && $correoElectronico && $usuario && $contrasena) {
        // Escapamos los datos para evitar inyección SQL
        $nombreCompleto = mysqli_real_escape_string($conexion, $nombreCompleto);
        $correoElectronico = mysqli_real_escape_string($conexion, $correoElectronico);
        $usuario = mysqli_real_escape_string($conexion, $usuario);
        $contrasena = mysqli_real_escape_string($conexion, $contrasena);



        // Verificar que el correo no se repita en la base de datos
        $consulta = "SELECT * FROM usuarios WHERE correo = '$correoElectronico'";
        // abrimos caja fuerte para poder ejecutar la consulta
        $ejecutarVerificacionCorreo = mysqli_query($conexion, $consulta);
        

        // basicamente le pasamos la instruccion esta que nos dice cuantas filas encontro, basicamente nos retorna un numero que nos dice la cantidad de filas que tiene el correo electronico por lo cual
        // si el correo electronico ya existe en la base de datos, entonces nos retornara un numero mayor a 0
        if(mysqli_num_rows($ejecutarVerificacionCorreo) > 0) {
            echo '<script>
                alert("El correo ya está registrado, intenta con otro");
                window.location = "../index.php";
            </script>';
            exit();
            mysqli_close($conexion);
        };

        // Verificar que el nombre de usuario no se repita en la base de datos
        // Misma logica que la anterior verificacion
        $consulta2 = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        
        $ejecutarVerificacionUsuario = mysqli_query($conexion, $consulta2);
        


        if(mysqli_num_rows($ejecutarVerificacionUsuario) > 0) {
            echo '<script>
                alert("El usuario ya está registrado, intenta con otro");
                window.location = "../index.php";
            </script>';
            exit();
            mysqli_close($conexion);
        };




        // Insertamos los datos en la base de datos
        $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
        VALUES ('$nombreCompleto', '$correoElectronico', '$usuario', '$contrasena')";
        // abrimos caja fuerte para poder ejecutar la consulta
        $ejecutar = mysqli_query($conexion, $query);

        if ($ejecutar) {
            echo '
            <script>
                alert("Usuario Agregado Correctamente");
                window.location = "../index.php";
            </script>';
        } else {
            echo "Error al registrar los datos: " . mysqli_error($conexion);
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
} else {
    echo "No se ha enviado el formulario.";
}

    mysqli_close($conexion);
?>
