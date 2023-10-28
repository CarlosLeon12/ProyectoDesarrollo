<?php
//cuando se inicia sesion
session_start();


//se mira si el formulario de inicio de sesión se ha enviado
if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {

    //conexion a base de datos
    include('conexion.php');

    //se obtienen los datos del inicio de sesion
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    //consultar la base de datos para verificar datos
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contraseña'";
    $result = mysqli_query($conexion, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Almacena el nombre de usuario y lo carga a la variable de sesion
        $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
        $_SESSION['cargo'] = $row['cargo'];

        //Redirigir a la página de inicio
        header("Location: inicio.php");
        exit();
    } else {
        //usuario o contraseña incorrectas mostrara un mensaje de error
        $_SESSION['mensaje'] = "Credenciales incorrectas. Por favor, intente de nuevo.";
        header("Location: login.php");
        exit();
    }
} else {
    // El formulario no se envió correctamente, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
?>
