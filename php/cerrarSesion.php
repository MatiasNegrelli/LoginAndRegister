<?php

    // Siempre tendremos que iniciar las sesion para trabajar con ella
    session_start();


    // cerramos sesion
    session_destroy();
    header('Location: ../index.php');

?>