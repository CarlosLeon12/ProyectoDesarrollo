<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">

</head>

<style>
    body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
  }
  
  .fullscreen-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
  }
</style>

<body>
<img class="fullscreen-image" src="https://i.pinimg.com/originals/83/77/c2/8377c28975c559f9ad494e64367dc048.jpg" alt="Imagen a pantalla completa">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="inicio.php">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">Cerrar Sesión</a>
                </li>

                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarOtros" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Otros
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarOtros">
                            <a class="dropdown-item" href="#">Donde Votas</a>
                            <a class="dropdown-item" href="#">Registro</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <img class="usuario" src="imagenes/usuario.png" alt="">
        
        <label class="nav-link navbar-brand nombre-usuario" href="">
            <?php
            // Inicia la sesión si no está iniciada
            session_start();
            if (isset($_SESSION['nombre_usuario'])) {
                echo $_SESSION['nombre_usuario'];
            } else {
                // Si no hay nombre de usuario, muestra este mensaje
                echo "Usuario no identificado";
            }
            ?>
        </label>
    </nav>

    <!-- Área de trabajo -->
    

    <div class="container mt-5 text">
        <form action="actualizarUsuario.php" method="post">
            <?php
            // Comprueba si se ha enviado un ID de usuario válido a través de la URL
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];

                // Realiza la conexión a la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "votaciones";

                $conexion = new mysqli($servername, $username, $password, $dbname);

                if ($conexion->connect_error) {
                    die("La conexión a la base de datos falló: " . $conexion->connect_error);
                }

                // Consulta SQL para obtener los datos del usuario con el ID especificado
                $consulta = "SELECT * FROM usuarios WHERE id = $id";
                $resultado = $conexion->query($consulta);

                if ($resultado->num_rows == 1) {
                    $fila = $resultado->fetch_assoc();
                    $nombreUsuario = $fila['nombre_usuario'];
                    $apellidoUsuario = $fila['apellido_usuario'];
                    $dpi = $fila['dpi'];
                    $usuario = $fila['usuario'];
                    $contrasena = $fila['contrasena'];
                    $cargo = $fila['cargo'];
                } else {
                    echo "No se encontró ningún usuario con el ID proporcionado.";
                }

                $conexion->close();
            } else {
                echo "ID de usuario no proporcionado.";
            }
            ?>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!-- Aquí se muestra el formulario con los datos del usuario -->
            <label style="font-size: 25px;" for="">Editar Usuario: <?php echo $usuario; ?></label><br><br><br>

            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <input type="text" class="form-control text" id="nombreU" name="nombreU" placeholder="Nombre Usuario" value="<?php echo $nombreUsuario; ?>" required>
                </div>
                <div class="col-md-4 mb-4">
                    <input type="text" class="form-control text" id="apellidoU" name="apellidoU" placeholder="Apellido Usuario" value="<?php echo $apellidoUsuario; ?>" required>
                </div>
                <div class="col-md-4 mb-5">
                    <input type="text" class="form-control text" id="dpiU" name="dpiU" placeholder="DPI" value="<?php echo $dpi; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <input type="text" class="form-control text" id="usuarioU" name="usuarioU" placeholder="Usuario" value="<?php echo $usuario; ?>" required>
                </div>
                <div class="col-md-4 mb-4">
                    <input type="password" class="form-control text" id="passwordU" name="passwordU" placeholder="Contraseña" value="<?php echo $contrasena; ?>" required>
                </div>
                <div class="col-md-4 mb-5">
                    <input type="text" class="form-control text" id="cargoU" name="cargoU" placeholder="Cargo" value="<?php echo $cargo; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block arriba">Guardar Cambios</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

