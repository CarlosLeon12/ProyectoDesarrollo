<?php

    $nombre = !empty($_POST['nombreU']) ? $_POST['nombreU'] : '';
    $apellido = !empty($_POST['apellidoU']) ? $_POST['apellidoU'] : '';
    $dpi = !empty($_POST['dpiU']) ? $_POST['dpiU'] : '';
    $usuario = !empty($_POST['usuarioU']) ? $_POST['usuarioU'] : '';
    $contrasena = !empty($_POST['passwordU']) ? $_POST['passwordU'] : '';
    $puesto = !empty($_POST['cargoU']) ? $_POST['cargoU'] : '';
   
    if($nombre && $apellido && $dpi && $usuario && $contrasena && $puesto){
        include('conexion.php');

        $conusulta="INSERT INTO usuarios(nombre_usuario, apellido_usuario, dpi, usuario, 
                                         contrasena, cargo) VALUE ('$nombre', '$apellido', '$dpi', '$usuario',
                                                                    '$contrasena', '$puesto');";

        if(!mysqli_query($conexion, $conusulta)){
            die('no se puedo guardar correctamente');
        }
    }
    header('Location: crearUsuario.php')

?>