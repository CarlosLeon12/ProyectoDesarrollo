<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibe los datos del formulario
    $id = $_POST['id'];
    $nombreUsuario = $_POST['nombreU'];
    $apellidoUsuario = $_POST['apellidoU'];
    $dpi = $_POST['dpiU'];
    $usuario = $_POST['usuarioU'];
    $contrasena = $_POST['passwordU']; 
    $cargo = $_POST['cargoU'];

    // Realiza la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "votaciones";

    $conexion = new mysqli($servername, $username, $password, $dbname);

    if ($conexion->connect_error) {
        die("La conexión a la base de datos falló: " . $conexion->connect_error);
    }

   
    $consulta = "UPDATE usuarios SET nombre_usuario='$nombreUsuario', apellido_usuario='$apellidoUsuario', dpi='$dpi', usuario='$usuario', contrasena='$contrasena', cargo='$cargo' WHERE id=$id";

    if ($conexion->query($consulta) === TRUE) {
       
        header("Location: eliminaUsuario.php");
        exit(); 
    } else {
        echo "Error al actualizar los datos del usuario: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Acceso no permitido.";
}
?>
