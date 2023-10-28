<?php
session_start();

if (isset($_SESSION['cargo']) && $_SESSION['cargo'] == 1) {
    
    $id = !empty($_GET['id']) ? $_GET['id'] : 0;

    if ($id) {
        include('conexion.php');
        $consulta = "DELETE FROM usuarios WHERE id=$id";

        if (mysqli_query($conexion, $consulta)) {
            
            header('Location: eliminaUsuario.php');
            exit();
        } else {
            echo 'No se pudo eliminar el usuario.';
        }
    } else {
        echo 'ID de usuario no válido.';
    }
} else {
    echo 'No tienes permiso para eliminar usuarios.';
}
?>